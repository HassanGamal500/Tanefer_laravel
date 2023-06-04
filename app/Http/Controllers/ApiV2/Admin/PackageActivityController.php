<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageActivityRequest;
use App\Http\Resources\Admin\PackageActivityListResource;
use App\Http\Resources\Admin\PackageActivityResource;
use App\Http\Resources\TourCityResource;
use App\Models\PackageActivity;
use App\Models\TourCity;
use App\Services\Packages\PackageActivityStoreService;
use App\Services\Packages\PackageHotelStoreService;
use App\Services\Packages\PackageStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::transaction(function () use ( $request, $validated ) {
            $packageActivity = PackageActivityStoreService::storePackageActivityMainData( $validated);

            if(! empty($request->seasons)){
                PackageActivityStoreService::storeSeasons($packageActivity,$request->seasons);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageActivity  $packageActivity
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(PackageActivity $packageActivity)
    {
        //
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
        if(is_null($packageActivity)){
            abort(404);
        }
        $validated = $request->validated();
        DB::transaction(function () use ($validated,$request,$packageActivity ) {
            $packageActivity->update( PackageActivityStoreService::collectPackageActivityMainData( $validated) );

            $packageActivity->seasons()->delete();

            if(! empty($request->seasons)){
                PackageActivityStoreService::storeSeasons($packageActivity,$request->seasons);
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
}
