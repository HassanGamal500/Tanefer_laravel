<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageActivityRequest;
use App\Http\Resources\Admin\PackageActivityCruise;
use App\Http\Resources\Admin\PackageActivityListResource;
use App\Http\Resources\Admin\PackageActivityResource;
use App\Http\Resources\TourCityResource;
use App\Models\AvailabilitiesTour;
use App\Models\PackageActivity;
use App\Models\PricingTiersTour;
use App\Models\Cruise;
use App\Models\TourCity;
use App\Services\Packages\PackageActivityStoreService;
use App\Services\Packages\PackageHotelStoreService;
use App\Services\Packages\PackageStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PackageActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $rowPerPage = $request->row_per_page ?? 10;
        $packageActivityQuery = PackageActivity::query();
        if($request->city_id )
            $packageActivityQuery->where('tour_city_id',$request->city_id);

        $packageActivity = $packageActivityQuery->paginate($rowPerPage);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> [
                'ActivityTotal'=> $packageActivity->total(),
                'ActivityList'=> PackageActivityResource::collection( $packageActivity )
            ]
        ]);
    }

    /**
     * Show the form for creating/editing the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function formLists(){
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=>[
                'cities'                => TourCityResource::collection(TourCity::all() ),
                'activityType'          => PackageActivity::activityType ,
                'activityDurationType'  => PackageActivity::activityDurationType ,
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PackageActivityRequest $request)
    {
        $validated = $request->validated();
        $datevalidated =  PackageActivityStoreService::valudatedateaval($request->availabilities);
        if(isset($datevalidated['status']) && $datevalidated['status'] == 400) {
            return response()->json($datevalidated);
        }
        $PricingTiersTour =  PackageActivityStoreService::storePricingTiersTourValid($request->availabilities);
        if(isset($PricingTiersTour['status']) && $PricingTiersTour['status'] == 400) {
            return response()->json($PricingTiersTour);
        }
        $errorAvailability =  PackageActivityStoreService::errorAvailabilityTime($request->availabilities, $validated);
        if(isset($errorAvailability['status']) && $errorAvailability['status'] == 400) {
            return response()->json($errorAvailability);
        }

        $validator = Validator::make($request->all(), [
            'slug' => 'nullable|string|max:500|unique:package_activities,slug',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::transaction(function () use ( $request, $validated ) {
            $packageActivity = PackageActivityStoreService::storePackageActivityMainData($validated);

            if(!empty($packageActivity['id'] && !empty($request->availabilities))) {
                $availabilityTime = PackageActivityStoreService::storeAvailabilityTime($request->availabilities, $packageActivity['id'],$validated);
                if(! empty($request->availabilities[0]['pricingtiers'])){
                    PackageActivityStoreService::storePricingTiersTour($request->availabilities,$availabilityTime, $packageActivity['id']);
                }
            }

            if ($validated['activity_type'] == 'camping') {
                foreach ( $validated['side_activity'] as $activity){
                    PackageActivityStoreService::storePackageActivitySideActivityData($packageActivity,$activity);
                }
            }

            if ($request->activity_image) {
                PackageActivityStoreService::storePackageActivityImage($packageActivity,$request->activity_image);
            }
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageActivity  $packageActivity
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($packageActivityId)
    {
        $packageActivity = PackageActivity::find($packageActivityId);
        if(is_null($packageActivity)){
            abort(404);
        }
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> new PackageActivityResource( $packageActivity )
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageActivity  $packageActivity
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PackageActivityRequest $request,$packageActivityId)
    {
        $packageActivity = PackageActivity::find($packageActivityId);
        $validated = $request->validated();
        if(is_null($packageActivity)){
            abort(404);
        }
        $PricingTiersTour =  PackageActivityStoreService::storePricingTiersTourValid($request->availabilities);
        if(isset($PricingTiersTour['status']) && $PricingTiersTour['status'] == 400) {
            return response()->json($PricingTiersTour);
        }

        $errorAvailability =  PackageActivityStoreService::errorAvailabilityTime($request->availabilities, $validated);
        if(isset($errorAvailability['status']) && $errorAvailability['status'] == 400) {
            return response()->json($errorAvailability);
        }


        $validator = Validator::make($request->all(), [
            'slug' => [
                'nullable',
                'string',
                'max:500',
                Rule::unique('package_activities', 'slug')->ignore($packageActivity),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }



        DB::transaction(function () use ($validated,$request,$packageActivity ) {
            $packageActivity->update(PackageActivityStoreService::collectPackageActivityMainData($validated, $packageActivity));

            if(!empty($packageActivity['id'] && !empty($request->availabilities))) {
                AvailabilitiesTour::where('package_activity_id', '=', $packageActivity['id'])->delete();
                $availabilityTime = PackageActivityStoreService::storeAvailabilityTime($request->availabilities, $packageActivity['id'],$validated);
                if(! empty($request->availabilities[0]['pricingtiers'])){
                    PricingTiersTour::where('availabilities_tour_id', '=', $availabilityTime)->delete();
                    PackageActivityStoreService::storePricingTiersTour($request->availabilities,$availabilityTime, $packageActivity['id']);
                }
            }

            if ($validated['activity_type'] == 'camping') {
                $packageActivity->packageActivitySideActivity()->delete();
                foreach ( $validated['side_activity'] as $activity){
                    PackageActivityStoreService::storePackageActivitySideActivityData($packageActivity,$activity);
                }
            }
        });
        return response()->json(['message' =>'operation done successfully', 'status' => 200]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageActivity  $packageActivity
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($packageActivityId)
    {
        $packageActivity = PackageActivity::find($packageActivityId);
        if(is_null($packageActivity)){
            abort(404);
        }

        $packageActivity->packageActivitySideActivity()->delete() ;
        if( $packageActivity->delete() )
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);

        return response()->json(['message' =>'operation failed', 'status' => 400]);

    }

    /**
     * Return list of Activities filtered by city id without pagination.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ActivityFilteredByCity(Request $request){

        $packageActivityQuery = PackageActivity::query();
        if($request->city_id )
            $packageActivityQuery->where('tour_city_id',$request->city_id);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> PackageActivityListResource::collection( $packageActivityQuery->get() )
        ]);
    }

    public function ActivityCruiseFilteredByCity(Request $request){

        $cityId = $request->city_id;
        $activity_type = $request->activity_type;

        if($activity_type === 'cruise') {
            $cruises = Cruise::select('id','name')->whereHas('cities', function ($q) use ($cityId) {
                $q->where('tour_cities.id', $cityId)->where('cruise_tour_city.is_start',1);
            })->get();
            return response()->json([ 'message' =>'success','status' => 200,
                'data'=> PackageActivityCruise::collection( $cruises )
            ]);

        } else {
            $packageActivityQuery = PackageActivity::query();
            if($request->city_id )
                $packageActivityQuery->where('tour_city_id',$request->city_id);

            return response()->json([ 'message' =>'success','status' => 200,
                'data'=> PackageActivityListResource::collection( $packageActivityQuery->get() )
            ]);

        }
    }
    public function fetchAllActivities()
        {
            $packageActivity = PackageActivity::all();

            return response()->json([
                'message' => 'success',
                'status' => 200,
                'data' => [
                    'ActivityTotal' => $packageActivity->count(),
                    'ActivityList' => PackageActivityResource::collection($packageActivity)
                ]
            ]);
        }
}
