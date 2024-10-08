<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivitiesBookingRequest;
use App\Http\Resources\Admin\CityAvalibleResource;
use App\Http\Resources\Admin\DurationResource;
use App\Http\Resources\Admin\PackageActivityResource;
use App\Http\Resources\Admin\PriceResource;
use App\Models\AvailabilitiesTour;
use App\Models\PackageActivity;
use App\Models\PricingTiersTour;
use App\Models\TourCity;
use App\Services\BookingService;
use App\Services\Packages\ActivityBookingService;
use App\Services\Packages\SearchService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PackageActivityController extends Controller
{
    public function index(Request $request) {
        $packageActivityQuery = SearchService::activitySearch($request->city_id,$request->duration,$request->start_time,$request->for_package,$request->type, $request->date, $request->activities) ;
        return responseJson($request, [
            'ActivityTotal'=> $packageActivityQuery->count(),
            'ActivityList'=> PackageActivityResource::collection( $packageActivityQuery->get() )
        ],'success');
    }

    public function calculateActivitiesPrice(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'activities' => 'required|array'
        ]);
        if($validator->fails()){
            throw new ValidationException($validator);
        }
        if(file_exists(storage_path('app/public/saveActivityPricing/pricing.txt'))){
            Storage::append('/saveActivityPricing/pricing.txt',"\n");
        }else{
            Storage::put('/saveActivityPricing/pricing.txt','');
        }

        $totalPrice = 0;
        $activities = [];
        foreach ($request->activities as $activity){
            $activityModel = PackageActivity::find($activity['activity_id']);
            $totalOccupancy = $request->adults + $request->children;
            if($totalOccupancy == 2) {
                $pricePerPerson = $activityModel->Limo_price;
                $childrenPercentage = $activityModel->limo_children_percentage;
                Storage::append('/saveActivityPricing/pricing.txt','pricePerPerson (limo): '.$pricePerPerson."\n");
            }elseif($totalOccupancy == 1 || $request->solo){
                $pricePerPerson = $activityModel->solo_price;
                $childrenPercentage = 0;
                Storage::append('/saveActivityPricing/pricing.txt','pricePerPerson (solo or 1): '.$pricePerPerson."\n");
            }elseif($totalOccupancy <= 8){
                $pricePerPerson = $activityModel->HiAC_price;
                $childrenPercentage = $activityModel->hiac_children_percentage;
                Storage::append('/saveActivityPricing/pricing.txt','pricePerPerson (HiAC_price): '.$pricePerPerson."\n");
            }elseif ($totalOccupancy <= 18){
                $pricePerPerson = $activityModel->Caster_price;
                $childrenPercentage = $activityModel->caster_children_percentage;
                Storage::append('/saveActivityPricing/pricing.txt','pricePerPerson (Caster_price): '.$pricePerPerson."\n");
            }elseif ($totalOccupancy <= 50){
                $pricePerPerson = $activityModel->bus_price;
                $childrenPercentage = $activityModel->bus_children_percentage;
                Storage::append('/saveActivityPricing/pricing.txt','pricePerPerson (bus_price): '.$pricePerPerson."\n");
            }else{
                $pricePerPerson = $activityModel->price_per_person;
                $childrenPercentage = 0;
                Storage::append('/saveActivityPricing/pricing.txt','pricePerPerson (otherwise): '.$pricePerPerson."\n");
            }

            $totalPriceForAdults = $pricePerPerson * ($request->adults);
            Storage::append('/saveActivityPricing/pricing.txt','totalPriceForAdults: '.$totalPriceForAdults."\n");
            $childrenPercentage = $childrenPercentage == 0 ? $activityModel->children_percentage : $childrenPercentage;
            $totalPriceForChildren = $pricePerPerson * $request->children * ($childrenPercentage / 100);
            Storage::append('/saveActivityPricing/pricing.txt','totalPriceForChildren: '.$totalPriceForChildren."\n");

            $totalPrice += $totalPriceForAdults + $totalPriceForChildren;

            $activityPrice = $totalPriceForAdults + $totalPriceForChildren;

            Storage::append('/saveActivityPricing/pricing.txt','totalPrice: '.$totalPrice."\n");

            if($request->singleSupplement){
                $totalPrice += ($totalPrice * ($activityModel->single_supplement_percentage/100)) + $totalPrice;
                Storage::append('/saveActivityPricing/pricing.txt','totalPriceWithSingleSupplement: '.$totalPrice."\n");
            }

            array_push($activities,['activityTitle' => $activityModel->title,'price' => $activityPrice]);
        }

        $sessionId = Str::uuid()->toString();

        $cacheTotalPrice = ['totalPrice' => $totalPrice];

        Cache::put($sessionId,$cacheTotalPrice,12000);

        return responseJson($request,['totalPrice' => $totalPrice, 'activities' => $activities,'sessionId' => $sessionId],'success');
    }

    public function calculateTourActivitiesPrice(Request $request) {
        $validator = Validator::make($request->all(),[
            'activities' => 'required|array'
        ]);
        if($validator->fails()){
            throw new ValidationException($validator);
        }

        $results = [];
        $totalPrice = 0;
        $fullTitleNames = '';
        $adults = $request->adults ?? 0;
        $children = $request->children ?? 0;

        foreach($request->activities as $activity) {
            $activityModel = PackageActivity::find($activity['activity_id']);
            $availabilityId = $activity['availability_id'];
            $activityResults = [];
            $totalOccupancy = $adults + $children;
            // $availabilities = PricingTiersTour::where('availabilities_tour_id', $availabilityId)->where('package_activity_id', $activity['activity_id'])->orderBy('min', 'asc')->get();
            // foreach($availabilities as $availability) {
            //     $doubleValuechild = $availability->child_percentage / 100.0;
            //     // if($availability->max >= $totalOccupancy && $availability->min <= $totalOccupancy) {
            //     if($availability->max >= $adults && $availability->min <= $adults) {
            //         $totalAdultPrice = $availability->adult_price * $adults;
            //         // $totalChildrenPrice = $children * $doubleValuechild * $availability->adult_price;
            //         // $totalChildrenPrice = $availability->max_child >= $children ? ($children * $doubleValuechild * $availability->adult_price) : 0;
            //         if($availability->max_child >= $children) {
            //             $totalChildrenPrice = $children * $doubleValuechild * $availability->adult_price;
            //         } else {
            //             return response()->json([
            //                 'status' => 400,
            //                 'errors' => 'Maximum number of children with ('.$availability->max.') adults is ('.$availability->max_child.')',
            //             ]);
            //         }
            //         $totalPriceActivity = $totalAdultPrice + $totalChildrenPrice;

            //         $activityTitle = $activityModel->title;
            //         $totalAdultPrice = isset($totalAdultPrice) ? $totalAdultPrice : 0;
            //         $totalChildrenPrice = isset($totalChildrenPrice) ? $totalChildrenPrice : 0;
            //         $totalPriceActivity = isset($totalPriceActivity) ? $totalPriceActivity : 0;

            //         $activityResults = [
            //             'activity_id' => $activity['activity_id'],
            //             'activityTitle' => $activityTitle,
            //             'totalAdultPrice' => $totalAdultPrice,
            //             'totalChildrenPrice' => $totalChildrenPrice,
            //             'subTotalPrice' => $totalPriceActivity,
            //         ];

            //         $totalPrice += $totalPriceActivity;
            //         $fullTitleNames .= empty($fullTitleNames) ? $activityModel->title : ' & ' . $activityModel->title;
            //     }
            // }
            
            $availability = PricingTiersTour::where('availabilities_tour_id', $availabilityId)
                ->where('package_activity_id', $activity['activity_id'])
                ->where('min', '<=', $adults)
                ->where('max', '>=', $adults)
                ->where('max_child', '>=', $children)
                ->orderBy('min', 'asc')
                ->first();
            
            if($availability) {
                $doubleValuechild = $availability->child_percentage / 100.0;
                
                $totalAdultPrice = $availability->adult_price * $adults;
                
                if($availability->max_child >= $children) {
                    $totalChildrenPrice = $children * $doubleValuechild * $availability->adult_price;
                } else {
                    return response()->json([
                        'status' => 400,
                        'errors' => 'Maximum number of children with ('.$availability->max.') adults is ('.$availability->max_child.')',
                    ]);
                }
                $totalPriceActivity = $totalAdultPrice + $totalChildrenPrice;

                $activityTitle = $activityModel->title;
                $totalAdultPrice = isset($totalAdultPrice) ? $totalAdultPrice : 0;
                $totalChildrenPrice = isset($totalChildrenPrice) ? $totalChildrenPrice : 0;
                $totalPriceActivity = isset($totalPriceActivity) ? $totalPriceActivity : 0;

                $activityResults = [
                    'activity_id' => $activity['activity_id'],
                    'activityTitle' => $activityTitle,
                    'totalAdultPrice' => $totalAdultPrice,
                    'totalChildrenPrice' => $totalChildrenPrice,
                    'subTotalPrice' => $totalPriceActivity,
                ];

                $totalPrice += $totalPriceActivity;
                $fullTitleNames .= empty($fullTitleNames) ? $activityModel->title : ' & ' . $activityModel->title;
            }

            if (count($activityResults) > 0) {
                // Add the activity results to the overall results array
                $results[] = $activityResults;
            } else {
                return response()->json([
                    'status' => 400,
                    'errors' => 'The number you have chosen is greater than the allowed number',
                ]);
            }
        }

        $sessionId = Str::uuid()->toString();

        $cacheTotalPrice = ['totalPrice' => $totalPrice];

        Cache::put($sessionId, $cacheTotalPrice, 12000);

        return response()->json([
            'message' => 'Activity Prices',
            'status' => 200,
            'totalPrice' => $totalPrice, // Add the total price to the response
            'fullTitleNames' => $fullTitleNames,
            'activities' => $results,
            'sessionId' => $sessionId
        ]);
    }

    public function book(ActivitiesBookingRequest $request)
    {
        $booking = ActivityBookingService::storeBookingMainData($request);

        ActivityBookingService::storeBookingData($booking,$request);

        BookingService::storeBookingHistory($booking);

        foreach ( $request->activities as $bookingActivity) {
            if(array_key_exists('date',$bookingActivity)){
                $startDay = strtolower(Carbon::parse($bookingActivity['date'])->format('l'));
                $packageActivity = PackageActivity::find($bookingActivity['activity_id']);
                if(! str_contains($packageActivity->start_days,$startDay) && ! empty($packageActivity->start_days)){
                    abort(422,'this activity not start in '.$startDay);
                }

                if(count($packageActivity->seasons) > 0){
                    $season = $packageActivity->seasons()->where('from','<=',$bookingActivity['date'])
                        ->where('to','>',$bookingActivity['date'])->first();
                    if(is_null($season)){
                        abort(422,'You cannot book activity in this day');
                    }
                }
            }
            ActivityBookingService::storeBookingActivityData($booking,$bookingActivity);
        }

        // foreach ($request->passengerDetails as $traveller) {
            ActivityBookingService::storeBookingTravellerData($booking,$request->passengerDetails);
        // }

        return responseJson($request,['booking_id' => $booking->id],'operation done successfully',);
    }


    public function filterSearch(Request $request) {
        $packageActivityQuery = SearchService::activityFilterSearch(
            $request->title,
            $request->price,
            $request->city_id,
            $request->duration,
            $request->duration_type,
            $request->type
        ) ;
        return responseJson($request, [
            'ActivityTotal'=> $packageActivityQuery->count(),
            'ActivityList'=> PackageActivityResource::collection( $packageActivityQuery->get() )
        ],'success');
    }

    public static function durationvalue(Request $request) {
        $duration_type = $request->duration_type;
        $durationActivityQuery = PackageActivity::where('duration_type',$duration_type)
        ->select('duration_digits')->distinct('duration_digits')->get();
        return response()->json([ 'message' =>'success','status' => 200, 'DurationList'=> DurationResource::collection( $durationActivityQuery )
        ]);
    }

    public static function pricefiltervalue() {
        $PackageActivityQuery = PackageActivity::select('id')->get();
        $priceList = [];
        foreach ($PackageActivityQuery as $Package) {
            $minPrice = PricingTiersTour::where('package_activity_id', $Package->id)->min('adult_price');
            $priceActivityQuery = PricingTiersTour::where('package_activity_id', $Package->id)->where('adult_price', $minPrice)->get();
            foreach ($priceActivityQuery as $price) {
                $priceList[] = new PriceResource($price);
            }
        }
        return response()->json(['message' => 'success', 'status' => 200, 'priceList' => PriceResource::collection($priceList)]);

    }
    public static function TourCityvalue() {
        $TourCityQuery = TourCity::select('id','name')->get();
        return response()->json([ 'message' =>'success','status' => 200, 'CityList'=> CityAvalibleResource::collection( $TourCityQuery )
        ]);
    }
    public static function validateTimeTour(Request $request) {
        $activities = $request->activities;
        $activityIds = [];
        foreach ($activities as $activity) {
            $activityIds[] = $activity['activity_id'];
        }
        $listActivitiesByTime = PackageActivity::whereIn('id', $activityIds)->orderBy('start_time', 'asc')->get();

        for ($i = 0; $i < count($activities) - 1; $i++) {
            $current_to_date = new DateTime($activities[$i]['from_date']);
            $next_from_date = new DateTime($activities[$i + 1]['from_date']);
            $end_time = $listActivitiesByTime[$i]['end_time'];
            if ($current_to_date == $next_from_date) {
                $next_activity_model = $listActivitiesByTime[$i+1];
                $next_start_time = $next_activity_model['start_time'];

                // if ($end_time >= $next_start_time) {
                //     return response()->json([
                //         'errors' => 'two adventures have the same time please select another one',
                //         'status' => 400
                //     ]);
                // }
            }
        }

        return response()->json([
            'message' => 'data correct',
            'status' => 200
        ]);
    }
    public static function validateTimeTourcamping(Request $request) {
        $activities = $request->activities;
        $durationResults = [];
        foreach($activities as $activity) {
            $activityModel = PackageActivity::find($activity['activity_id']);
            $availabilitiesTour = AvailabilitiesTour::where('package_activity_id', $activityModel->id)
                ->where('from_date', $activity['from_date'])->get();
            $activityResults = [
                "availabilitiesTour" => $availabilitiesTour,
                "duration_digits" => $activityModel->duration_digits,
                "end_time" => $activityModel->end_time,
                "start_time" => $activityModel->start_time,
            ];
            $durationResults[] = $activityResults;
        }

        if(count($durationResults) > 1){
            for ($i = 0; $i < count($durationResults) - 1; $i++) {
                for ($j = 0; $j < count($durationResults[$i]['availabilitiesTour']); $j++) {
                    $current_to_date = new DateTime($durationResults[$i]['availabilitiesTour'][$j]["to_date"]);
                    $next_from_date = new DateTime($durationResults[$i + 1]['availabilitiesTour'][$j]["from_date"]);
                    $end_time = $durationResults[$i]['end_time'];
                    $start_time = $durationResults[$i+ 1]['start_time'];



                    if ($current_to_date > $next_from_date) {
                        return response()->json([
                            'errors' => 'please select another adventure There is a similarity with the start date of the new adventure and the end date of the previous adventure',
                            'status' => 400
                        ]);
                    } else if ($current_to_date == $next_from_date && $end_time >= $start_time) {
                        return response()->json([
                            'errors' => 'please select another adventure There is a similarity with the start time of the new journey and the end time of the previous one',
                            'status' => 400
                        ]);
                    }
                }
            }
            return response()->json([
                'message' => 'data correct',
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'data correct',
                'status' => 200
            ]);
        }


    }
}
