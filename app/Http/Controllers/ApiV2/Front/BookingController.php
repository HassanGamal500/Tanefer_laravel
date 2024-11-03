<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmation;
use App\Mail\NewBooking;
use App\Mail\SendCustomPackage;
use App\Mail\ConfirmIntegrationBooking;
use App\Mail\BookingCruiseConfirmation;
use App\Models\CustomPackage;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookingCompleteRequest;
use App\Http\Requests\BookingSaveRequest;
use App\Http\Resources\BookingHistoryResource;
use App\Models\Booking;
use App\Models\Cruise;
use App\Models\PackageActivity;
use App\Models\PackageBookingData;
use App\Models\TourCity;
use App\Services\Packages\BookingService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use PDF;
use App\Jobs\FinalBookingGTA;
use App\Models\BookingHistory;
use App\Services\BookingService as ServicesBookingService;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

class BookingController extends Controller
{
    public function save(BookingSaveRequest $request)
    {
        if (! is_null($request->start_date)) {
            $startDay = ucfirst(strtolower(Carbon::parse($request->start_date)->format('l')));
            $package = Package::find($request->package_id);
            $days = $package->packageAbilities->pluck('days');
            if (!str_contains($days, $startDay) && ! empty($days)) {
                abort(422, 'this tour not start in ' . $startDay);
            }
        }

        // if(count($package->seasons) > 0 && !is_null($request->start_date)){
        //     $season = $package->seasons()->where('from','<=',$request->start_date)
        //         ->where('to','>',$request->start_date)->first();
        //     if(is_null($season)){
        //         abort(422,'You cannot book package in this day');
        //     }
        // }

        $validated = $request->validated();

        if (Cache::has($request->sessionId)) {
            $cachedTotalPrice = Cache::get($request->sessionId);
            if ($cachedTotalPrice['totalPrice'] != $request->total_price) {
                $cachedTotalPrice = json_encode($cachedTotalPrice);
                return responseJson(
                    $request,
                    new \stdClass(),
                    'Package Total Price not valid, Valid price is ' . $cachedTotalPrice,
                    422
                );
            } else {
                $request->total_price = $request->final_price ? $request->final_price : $request->total_price;
                $validated['total_price'] = $request->final_price;
            }
        } else {
            return responseJson($request, new \stdClass(), 'Something wrong in total price', 422);
        }

        // foreach ($request->booking_cities as $booking_city){

        //     for ($i = 0; $i < count($booking_city['hotelRooms']); $i++){
        //         if(count($booking_city['hotelRooms']) != count($request->roomGuests)){
        //             return responseJson($request,new \stdClass(),'Select rooms not equal number of rooms entered',422);
        //         }

        //         $hotelRoom = $booking_city['hotelRooms'][$i];
        //         $maxRoomAdult = $hotelRoom['roomMaxNumberOfAdult'];
        //         $maxRoomChildren = $hotelRoom['roomMaxNumberOfChildren'];

        //         if($request->roomGuests[$i]['adults'] > $maxRoomAdult || $request->roomGuests[$i]['children'] > $maxRoomChildren){
        //             return responseJson($request,new \stdClass(),
        //                 'Your occupancy exceeds the hotel rooms occupancy selected',422);
        //         }
        //     }
        // }


        $contactName = $request->contact_name ? $request->contact_name : $validated['bookingDetails']['contact_name'];
        $contactEmail = $request->contact_email ? $request->contact_email : $validated['bookingDetails']['contact_email'];

        DB::transaction(function () use ($validated) {
            $booking = BookingService::storeBookingMainData($validated);
            // foreach ( $validated['booking_cities'] as $key => $booking_city ){
            //     BookingService::storeBookingCityData($booking,$booking_city);
            // }
        });
        $booking = Booking::with(['bookingData', 'package.packageCity'])->orderBy('id', 'DESC')->first();
        BookingService::storeAdventure($request->activities, $booking->id, $request->package_id);
        BookingService::storeHotel($request->accommodation, $booking->id);
        BookingService::storeHotelJPCode($validated, $booking->id);
        $bookingdata = Booking::find($booking->id);
        ServicesBookingService::storeBookingHistory($booking);
        DB::transaction(function () use ($bookingdata, $validated) {

            // foreach ($validated['passengerDetails'] as $traveller){
            BookingService::storeBookingTravelerData($bookingdata, $validated['passengerDetails']);
            // }
            BookingService::storeBookingTData($bookingdata, $validated['bookingDetails']);
        });

        if ($checkHasCruise = $booking->package->packageCity->where('type', 'cruise')->first()) {
            $cruise = Cruise::where('id', $checkHasCruise->cruise_id)->first();
            $booking->cruise = $cruise;
        } else {
            $booking->cruise = null;
        }

        if ($booking->model_ids == null && $booking->model_type == 'App\Models\Package') {
            $package_data = PackageBookingData::select('adventrue_id', 'day_number', 'package_city_id', 'id')
                ->where('booking_id', $booking->id)
                ->whereNull('cruise_id')
                ->get();

            $package_data_cruise = PackageBookingData::select('cruise_id', 'day_number', 'package_city_id', 'id')
                ->where('booking_id', $booking->id)
                ->whereNotNull('cruise_id')
                ->get();

            $adventures = [];
            $cruises = [];
            $combinedList = [];
            $package_name = $booking->package->title;

            // Processing adventures
            foreach ($package_data as $advent) {
                $adventures_id = PackageActivity::where('id', $advent['adventrue_id'])->first();
                $package_city_id = TourCity::where('id', $advent['package_city_id'])->pluck('name')->first();

                if ($adventures_id) {
                    $adventure_id = $adventures_id;
                    $day_number = $advent['day_number'];

                    $adventures[] = [
                        'id' => $advent->id,
                        'adventure_id' => $adventure_id,
                        'day_number' => $day_number,
                        'package_city_id' => $package_city_id,
                    ];
                } else {
                    $day_number = $advent['day_number'];
                    $adventures[] = [
                        'id' => $advent->id,
                        'adventure_id' => 'null',
                        'day_number' => $day_number,
                        'package_city_id' => null,
                    ];
                }
            }

            // Processing cruises
            foreach ($package_data_cruise as $cruise) {
                $cruise_id = Cruise::where('id', $cruise['cruise_id'])->first();
                $package_city_id = TourCity::where('id', $cruise['package_city_id'])->pluck('name')->first();

                if ($cruise_id) {
                    $cruisee = $cruise_id;
                    $day_number = $cruise['day_number'];

                    $cruises[] = [
                        'id' => $cruise->id,
                        'cruise_id' => $cruisee,
                        'day_number' => $day_number,
                        'package_city_id' => $package_city_id,
                    ];
                }
            }
            $combinedList = collect(array_merge($adventures, $cruises))->sortby('id');
        }

        $bookId = $booking->id;
        $price = $booking->total_price;
        $username = $contactName;
        $email = $contactEmail;
        $cruiseData = $booking->cruise;
        $startDate = $booking->start_date;
        $addtionalMessage = 'We will contact you within 48 hours';
        $combinedList = $combinedList;
        $booking = $booking;
        $package_name = $package_name;

        // Mail::to($email)->send(new BookingCruiseConfirmation($bookId, $price, $username, $email, $cruiseData, $startDate, $addtionalMessage, $combinedList, $booking, $package_name));

        $url = 'https://tanefer.com/trip-booking/' . $booking->id;

        $pdf = PDF::loadView('email_templates.new_booking_confirmation', [
            'url' => $url,
            'total_price' => $price,
            'contact_name' => $contactName,
            'combinedList' => $combinedList,
            'booking' => $booking,
            'package_name' => $package_name,
        ]);

        $mail = new NewBooking($url, $price, $contactName, $combinedList, $booking, $package_name);

        Mail::to([$contactEmail, 'online@tanefer.com'])->send($mail->attachData($pdf->output(), "package_itenrary.pdf"));

        $bookingdata->update(['send_confirm_email' => 1]);

        $customTextMessage = '
            Thank you, (' . $contactName . ')
            we have received your inquiry and one of our travel experts will contact you within 48 hours.
            We\'ll send your new travel plans to : ' . $contactEmail . '
            Don\'t see a response after 48 hours? Please check your spam folder for a message from Tanefer team . We all end up there occasionally.
        ';

        return  responseJson($request, ['booking_id' => $booking->id, 'custom_text_message' => $customTextMessage], 'operation done successfully');
    }

    public function complete($id, BookingCompleteRequest $request)
    {
        $validated = $request->validated();
        $booking = Booking::find($id);

        DB::transaction(function () use ($booking, $validated) {

            foreach ($validated['passengerDetails'] as $traveller) {
                BookingService::storeBookingTravelerData($booking, $traveller);
            }
            BookingService::storeBookingTData($booking, $validated['bookingDetails']);
        });

        return responseJson($request, [], 'operation done successfully');
    }

    public function saveToEmail()
    {
        $validator = Validator::make(request()->all(), [
            'url' => 'required|url',
            'email' => 'required|email',
            'package' => 'required'
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $customPackageId = Str::uuid();

        CustomPackage::create([
            'custom_package_id' => $customPackageId,
            'package' => json_encode(request()->all()),
        ]);

        $url = request()->url . '?custom_package=' . $customPackageId->toString();
        Mail::to([request()->email, 'online@tanefer.com'])->send(new SendCustomPackage(request()->email, $url));

        return responseJson(request(), [], 'Email send to you with custom package link');
    }

    public function confirmBooking()
    {
        if (request()->merchant_extra) {
            $adventures = '';
            $cruises = '';
            $package_name = '';
            $booking = Booking::find(request()->merchant_extra);
            if (request()->url) {
                $url = request()->url . '/' . $booking->id;
            } else {
                $url = 'https://tanefer.com/trip-booking/' . $booking->id;
            }

            if (request()->response_message == 'Success') {
                $booking->update([
                    'status' => 'Confirm Payment',
                    'transaction_id' => request()->fort_id,
                    'authorization_code' => request()->authorization_code
                ]);

                ServicesBookingService::updateBookingHistory($booking);

                if (($booking->model_type == 'App\Models\GtaHotelPortfolio' || $booking->model_type == 'App\Models\Package') && $booking->integration_booked == 0) {
                    $hotelFormData = \DB::table('hotel_object_forms')->where('id', $booking->hotel_object_form_id)->first();
                    if ($booking->model_type == 'App\Models\Package') {
                        $hotelData = \DB::table('gta_hotel_portfolios')->where('id', $booking->model_id)->first();
                    } else {
                        if ($booking->hotel_jpcode) {
                            $hotelData = \DB::table('gta_hotel_portfolios')->where('Jpd_code', $booking->hotel_jpcode)->first();
                        }
                    }
                    if ($hotelFormData) {
                        dispatch(new FinalBookingGTA($booking->id));

                        // $getRequestData = json_decode($hotelFormData->request_data);
                        // $getBodyData = json_decode($hotelFormData->body);
                        // $options = array(
                        //     'soap_version'  => SOAP_1_2,
                        //     'encoding'      => 'UTF-8',
                        //     'exceptions'    => true,
                        //     'trace'         => true,
                        //     'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
                        // );

                        // $client = new \SoapClient("http://xml.gte.travel/WebService/JP/WebServiceJP.asmx?WSDL", $options);

                        // $requestData = $getRequestData;

                        // // try {
                        //     $response = $client->__soapCall('HotelBooking', array('parameters' => $requestData));
                        //     $bookingRS = $response->BookingRS;
                        //     dd($requestData, $bookingRS);
                        //     if($bookingRS) {
                        //         if($booking->model_type == 'App\Models\GtaHotelPortfolio'){
                        //             Mail::to($getBodyData->email)->send(new ConfirmIntegrationBooking($getBodyData->name, $hotelData->name, $bookingRS->Reservations->Reservation->Locator, $getBodyData->startDate, $getBodyData->endDate, $booking->adults, $booking->children));
                        //         }
                        //         $booking->update([
                        //             'integration_booked'    => 1,
                        //             'hotel_int_code'        => $bookingRS->IntCode,
                        //             'hotel_locator'         => $bookingRS->Reservations ? $bookingRS->Reservations->Reservation->Locator : null,
                        //             'hotel_start_date'      => $getBodyData->startDate,
                        //             'hotel_end_date'        => $getBodyData->endDate,
                        //             'send_confirm_email'    => 1
                        //         ]);
                        //     }
                        // // } catch (SoapFault $fault) {
                        // //     // echo "Error: " . $fault->getMessage();
                        // // }
                    }
                }
            }

            if ($booking->model_ids != null && $booking->model_type == 'App\Models\PackageActivity') {
                $bookingdata = explode(",", $booking->model_ids);
                $combinedList = PackageActivity::whereIn('id', $bookingdata)->get();
            }

            if ($booking->model_ids == null && $booking->model_type == 'App\Models\Package') {
                $package_data = PackageBookingData::select('adventrue_id', 'day_number', 'package_city_id', 'id')
                    ->where('booking_id', $booking->id)
                    ->whereNull('cruise_id')
                    ->get();

                $package_data_cruise = PackageBookingData::select('cruise_id', 'day_number', 'package_city_id', 'id')
                    ->where('booking_id', $booking->id)
                    ->whereNotNull('cruise_id')
                    ->get();

                $adventures = [];
                $cruises = [];
                $combinedList = [];
                $package_name = $booking->package->title;

                // Processing adventures
                foreach ($package_data as $advent) {
                    $adventures_id = PackageActivity::where('id', $advent['adventrue_id'])->first();
                    $package_city_id = TourCity::where('id', $advent['package_city_id'])->pluck('name')->first();

                    if ($adventures_id) {
                        $adventure_id = $adventures_id;
                        $day_number = $advent['day_number'];

                        $adventures[] = [
                            'id' => $advent->id,
                            'adventure_id' => $adventure_id,
                            'day_number' => $day_number,
                            'package_city_id' => $package_city_id,
                        ];
                    } else {
                        $day_number = $advent['day_number'];
                        $adventures[] = [
                            'id' => $advent->id,
                            'adventure_id' => 'null',
                            'day_number' => $day_number,
                            'package_city_id' => null,
                        ];
                    }
                }

                // Processing cruises
                foreach ($package_data_cruise as $cruise) {
                    $cruise_id = Cruise::where('id', $cruise['cruise_id'])->first();
                    $package_city_id = TourCity::where('id', $cruise['package_city_id'])->pluck('name')->first();

                    if ($cruise_id) {
                        $cruisee = $cruise_id;
                        $day_number = $cruise['day_number'];

                        $cruises[] = [
                            'id' => $cruise->id,
                            'cruise_id' => $cruisee,
                            'day_number' => $day_number,
                            'package_city_id' => $package_city_id,
                        ];
                    }
                }
                $combinedList = collect(array_merge($adventures, $cruises))->sortby('id');
            }

            if ($booking->model_type != 'App\Models\Cruise' && $booking->model_type != 'App\Models\GtaHotelPortfolio') {
                $pdf = PDF::loadView('email_templates.new_booking_confirmation', [
                    'url' => $url,
                    'total_price' => $booking->total_price,
                    'contact_name' => $booking->bookingData->contact_name,
                    'combinedList' => $combinedList,
                    'booking' => $booking,
                    'package_name' => $package_name,
                ]);

                $mail = new NewBooking($url, $booking->total_price, $booking->bookingData->contact_name, $combinedList, $booking, $package_name);
                Mail::to([$booking->bookingData->contact_email, 'online@tanefer.com'])
                    ->send($mail->attachData($pdf->output(), "package_itenrary.pdf"));

                $booking->update(['send_confirm_email' => 1]);
            } else {
                // Mail::to($booking->bookingData->contact_email)
                //     ->send(new NewBooking($url, $booking->total_price, $booking->bookingData->contact_name, $adventures, $booking, $cruises, $package_name));

                // $booking->update(['send_confirm_email' => 1]);
            }

            if (($booking->model_type == 'App\Models\GtaHotelPortfolio' || $booking->model_type == 'App\Models\Package')) {
                // Determine if $combinedList exists or should be null
                $combinedList = isset($combinedList) ? $combinedList : null;
            
                // Load the view with conditional combined list
                $pdf = PDF::loadView('email_templates.new_booking_confirmation', [
                    'url' => $url,
                    'total_price' => $booking->total_price,
                    'contact_name' => $booking->bookingData->contact_name,
                    'combinedList' => $combinedList,
                    'booking' => $booking,
                    'package_name' => $package_name,
                ]);
            
                // Prepare the email with the same conditional combined list
                $mail = new NewBooking($url, $booking->total_price, $booking->bookingData->contact_name, $combinedList, $booking, $package_name);
                Mail::to([$booking->bookingData->contact_email, 'online@tanefer.com'])
                    ->send($mail->attachData($pdf->output(), "package_itenrary.pdf"));
            
                $booking->update(['send_confirm_email' => 1]);
                $message = 'You have been booked successfully';
                return responseJson(request(), [], $message);
            } else {
                $message = 'Your booking confirmed';
                return responseJson(request(), [], $message);
            }

        }

        $message = 'Your booking under processing, We will email you soon with booking status';

        return responseJson(request(), [], $message);
    }

    public function displayCustomPackage()
    {
        $customPackage = CustomPackage::where('custom_package_id', request()->custom_package)->first();
        if (is_null($customPackage)) {
            return response()->json(['message' => 'This custom package not found'], 404);
        }

        return responseJson(request(), json_decode($customPackage->package), 'success');
    }

    public function bookingDetails($id)
    {
        $booking = Booking::with([
            'bookingCity',
            'bookingPayment',
            'bookingTraveler',
            'bookingData',
            'startCity',
            'endCity',
            'package'
        ])->where('id', $id)->first();
        if (is_null($booking)) {
            return responseJson(request(), [], 'this booking not found', 404);
        }

        return responseJson(request(), ['bookingDetails' => $booking], 'success');
    }

    public function testmail()
    {
        $url = 'data';
        Mail::to('ahmed@nahrdev.com')->send(new SendCustomPackage('ahmed@nahrdev.com', $url));
        $message = 'Your booking under processing, We will email you soon with booking status';
        return response()->json(['message' => 'operation done successfully', 'status' => 200]);
    }

    public function bookingHistory()
    {
        $user = Auth::guard('passport')->user();
        // $userDetails = [
        //     'name' => $user->username,
        //     'email' => $user->email,
        //     'phone' => $user->phone
        // ];
    
        $rowPerPage = request()->row_per_page ?? 10;
    
        // Modify the query to filter by the authenticated user's ID
        $historyQuery = BookingHistory::where('user_id', $user->id)
                                      ->search(request());
    
        $histories = $historyQuery->paginate($rowPerPage);
    
        return responseJson(request(), [
            'historyTotal' => $histories->total(),
            'historyList' => BookingHistoryResource::collection($histories),
            //'userDetails' => (object)$userDetails
        ], 'success');
    }
    

    public function bookingHistoryDetail($id)
    {
        $details = BookingHistory::find($id);
        if (is_null($details)) {
            return responseJson(request(), [], 'This booking detail not found', 404);
        }
        return new BookingHistoryResource($details);
    }    
}
