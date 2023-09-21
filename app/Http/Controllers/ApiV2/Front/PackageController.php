<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageCalculateTotalPriceRequest;
use App\Http\Resources\Admin\PackageActivityDetails;
use App\Http\Resources\Admin\PackageResource;
use App\Http\Resources\Admin\PackageResource as PackageDetailsResource;
use App\Models\AvailabilitiesTour;
use App\Models\Package;
use App\Models\PackageActivity;
use App\Models\PackageBookingadventrue;
use App\Models\PackageCity;
use App\Models\PackageCityTransportation;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelRoomSeason;
use App\Models\PackageSlugHistory;
use App\Models\PricingTiersTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use DateTime;

class PackageController extends Controller
{
    /**
     * data for trip home page
     **/
    public function index(Request $request){

        $tripsNumber = $request->trips_number ?? 6 ;
        $trip = Package::orderBy('price_per_person','asc')->take($tripsNumber)->get();

        return responseJson($request,PackageResource::collection( $trip ),'success');
    }

    public function topPackages()
    {
        $packages = Package::where('is_top', 1)->orderBy('rank','desc')->get();

        return responseJson(\request(),PackageResource::collection( $packages ),'success');
    }

    public function search(Request $request, $cityID = null )
    {

        $tripQuery = Package::query();
        if( $cityID ) {
            $tripQuery->whereHas('packageCity',function ($cityQuery) use ( $cityID ){
                $cityQuery->where('tour_city_id',$cityID);
            });
        }
        $trips = $tripQuery->orderByDesc('price_per_person')->get();

      return  responseJson($request, [
            'tripTotal'=> $trips->count(),
            'tripList'=> PackageResource::collection( $trips )
        ],'success');
    }

    public function details($term)
    {
        $trip = Package::where('slug',$term)->first();

        if(is_null($trip)){
            $trip = Package::find($term);
            if(is_null($trip)){
                $tripPackage = PackageSlugHistory::where('slug',$term)->first();
                if($tripPackage != null){
                    $trip = $tripPackage->package;
                    $prices = ['solo'=>$trip->solo_packageprice,'limo'=>$trip->Limo_packageprice,'hiac'=>$trip->HiAC_packageprice,'caster'=>$trip->Caster_packageprice
                        ,'bus'=>$trip->bus_packageprice,'children_percentage'=>$trip->children_percentage];
                    return responseJson(\request(),new PackageActivityDetails ( $trip ),'redirect to the correct package',
                        301,['prices' => $prices,'slug' => $trip->slug]);
                }else{
                    return responseJson(\request(), new \stdClass(),'Package Not found',404);
                }
            }
        }

        $prices = ['solo'=>$trip->solo_packageprice,'limo'=>$trip->Limo_packageprice,'hiac'=>$trip->HiAC_packageprice,'caster'=>$trip->Caster_packageprice
        ,'bus'=>$trip->bus_packageprice,'children_percentage'=>$trip->children_percentage];

        return responseJson(\request(),new PackageActivityDetails ( $trip ),'success',200,['prices' => $prices]);
    }

    public function childrenpolicy($packageid)
    {
        return responseJson(\request(),Package::where('id',$packageid)->first()->packageChildrenPolicies,'success');
    }

    public function calculateTotalPrice(PackageCalculateTotalPriceRequest $request)
    {
        $packageService = new \App\Services\Packages\Package();

        return responseJson($request,$packageService->calculateTotalPrice($request),'success');
    }

    public function calculateAllPrice(Request $request)
    {
        $adults = $request->adults ?? 0;
        $children = $request->children ?? 0;
        $adventure_id = $request->adventures;
        $package_id = $request->package_id;
        $date = $request->date;
        $totalOccupancy = $adults + $children;
        $availabilities = [];
        $totalPrice = 0;
        if ($adventure_id == null && $adventure_id == 'null') {
            return response()->json([
                'status' => 400,
                'errors' => 'No Data Available',
            ]);
        }
        if($date == null && $date == 'null') {
            return response()->json([
                'status' => 400,
                'errors' => 'Please Select Date',
            ]);
        }

        $listActivitiesByTime = PackageActivity::whereIn('id', $adventure_id)->orderBy('start_time', 'asc')->get();

        for ($i = 0; $i < count($listActivitiesByTime) - 1; $i++) {
            $current_activity = $listActivitiesByTime[$i];
            $next_activity = $listActivitiesByTime[$i + 1];

            $current_end_time = $current_activity->end_time;
            $next_start_time = $next_activity->start_time;
            if ($current_end_time >= $next_start_time) {
                return response()->json([
                    'errors' => 'Two adventures have the same time. Please select another one.',
                    'status' => 400
                ]);
            }
        }
        foreach($adventure_id as $adventure) {

            $packageActivityQuery = AvailabilitiesTour::where('from_date', '<=', $date)->where('to_date', '>=', $date)->where('package_activity_id',$adventure)->pluck('id');
            if (!$packageActivityQuery) {
                return response()->json([
                    'status' => 400,
                    'errors' => 'No Data Available For This Date',
                ]);
            }
            foreach($packageActivityQuery as $packageActivity) {

                $availability  = PricingTiersTour::where('package_activity_id', $adventure)->where('availabilities_tour_id', $packageActivity)->get();

                if ($availability->isNotEmpty()) {
                    $availabilities[] = $availability;
                } else {
                    return response()->json([
                        'status' => 400,
                        'errors' => 'No Tours Package Available',
                    ]);
                }

            }

        }
        $allIds = collect($availabilities)->flatten()->toArray();
        foreach ($allIds as $idd) {
            $doubleValuechild = $idd['child_percentage'] / 100.0;
            if($idd['max'] >= $totalOccupancy && $idd['min'] <= $totalOccupancy) {
                $totalAdultPrice = $idd['adult_price'] * $adults;

                $totalChildrenPrice = $children * $doubleValuechild * $idd['adult_price'];

                $totalPriceActivity = $totalAdultPrice + $totalChildrenPrice;


                $totalAdultPrice = isset($totalAdultPrice) ? $totalAdultPrice : 0;
                $totalChildrenPrice = isset($totalChildrenPrice) ? $totalChildrenPrice : 0;
                $totalPriceActivity = isset($totalPriceActivity) ? $totalPriceActivity : 0;


                $totalPrice += $totalPriceActivity;
            }
        }

        // get transportations
        $transportations = PackageCityTransportation::where('package_id', $package_id)->pluck('price_per_person')->sum();

        $transportations = $transportations * $totalOccupancy;
        // get cruise id
        $cruise_id = PackageCity::where('package_id', $package_id)->where('type', 'cruise')->whereNotNull('cruise_id')->pluck('cruise_id');


        if($cruise_id != null) {
            // get price_per_day from cruise
            $cruisePrice = PackageHotelRoomSeason::whereIn('package_hotel_room_id', function ($query) use ($cruise_id) {
                $query->select('id')
                    ->from(with(new PackageHotelRoom())->getTable())
                    ->whereIn('model_id', $cruise_id)
                    ->where('model_type', 'App\Models\Cruise');
            })
            ->pluck('price_per_day')
            ->sum();

            $cost = $totalPrice + $transportations +  $cruisePrice;
        } else {
            $cost = $totalPrice + $transportations ;
        }




        if ($cost != 0 && $cost != null) {
            $sessionId = Str::uuid()->toString();

            $cacheTotalPrice = ['totalPrice' => $cost];

            Cache::put($sessionId, $cacheTotalPrice, 12000);

            return response()->json([
                'message' => 'Activity Prices',
                'status' => 200,
                'totalPrice' => $cost,
                'sessionId' => $sessionId
            ]);

        } else {
            return response()->json([
                'status' => 400,
                'errors' => 'The number you have chosen is greater than the allowed number',
            ]);
        }


    }


}
