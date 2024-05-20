<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageRequest;
use App\Http\Resources\Admin\PackageActivityDetails;
use App\Http\Resources\Admin\PackageResource;
use App\Http\Resources\TourCityResource;
use App\Models\Package;
use App\Models\PackageSlugHistory;
use App\Models\TourCity;
use App\Models\Trip;
use App\Models\PackageCityTransportation;
use App\Services\Packages\PackageStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $rowPerPage = $request->row_per_page ?? 10;
        $packageQuery = Package::query();
        if($request->city_id ) {
            $packageQuery->whereHas('packageCity',function ($cityQuery) use ( $request ){
                $cityQuery->where('tour_city_id',$request->city_id)->where('start',1);
            });
        }
        else{
            $packageQuery->whereNotNull('id');
        }

        $package = $packageQuery->orderByDesc('id')->paginate($rowPerPage);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> [
                'packageTotal'=> $package->total(),
                'packageList'=> PackageResource::collection($package)
            ]
        ]);
    }

    /**
     * Show the form for creating/editing the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function formLists()
    {
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=>[
                'cities'                => TourCityResource::collection(TourCity::all() ),
                'transportationType'    => PackageCityTransportation::transportationType ,
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PackageRequest $request)
    {
        // return response()->json(['message' => $request->all(), 'status' => 400]);
        $validated = $request->validated();
        DB::transaction(function () use ( $validated,$request ) {
             $package =  PackageStoreService::storePackageMainData($validated);

            if(! empty($request->availabilties)){
                PackageStoreService::availAbilities($package['id'],$request->availabilties);
            }
            if(! empty($request->activities)){
                $packageType = PackageStoreService::storeAdventureOrCruise($package['id'],$request->activities);
                $daysId = PackageStoreService::storeAdventuredays($request->activities,$packageType['adventure'], $package['id']);
                PackageStoreService::storeAdventure($request->activities,$packageType['adventure'], $daysId,$package['id']);

                // PackageStoreService::storeTransportations($request->activities,$packageType['adventure'], $package['id'],$packageType['cruise']);
            }
            if( isset($request->accommodation) && !empty($request->accommodation)){

                PackageStoreService::storeHotel($request->accommodation,$package['id']);
            }


            // if(! empty($request->seasons)){
            //     PackageStoreService::storeSeasons($package,$request->seasons);
            // }
            // foreach ( $validated['package_cities'] as $key => $packageCity ){

            //     $packageCity = $this->mergeExtraPackageCityData($validated,$key,$packageCity);
            //     PackageStoreService::storePackageCityData($package,$packageCity);
            // }
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function checkSlugAvailability()
    {
        $package = Package::where('slug',\request()->slug)->first();

        if(is_null($package)){
            return response()->json(['availability' => true,'alternative' => '']);
        }else{
            return response()->json(['availability' => false,'alternative' => \request()->slug.'_'.$package->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $package = Package::findOrFail($id);
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> new PackageActivityDetails( $package )
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PackageRequest $request, $id)
    {
        $package = Package::find($id);
        $validated = $request->validated();
        DB::transaction(function () use ( $validated ,$request, $package) {
            if($request->slug != $package->slug){
                $package->slugHistories()->create(['slug' => $package->slug]);
            }
            $package->update( PackageStoreService::collectPackageMainData($validated) );

            if(! empty($request->availabilties)){
                $package->packageAbilities()->delete();
                PackageStoreService::availAbilities($package['id'],$request->availabilties);
            }
            if(! empty($request->activities)){
                $package->packageCity()->delete();
                $package->packageTransportations()->delete();
                $packageType = PackageStoreService::storeAdventureOrCruise($package['id'],$request->activities);
                $package->packageAdventuredays()->delete();
                $daysId = PackageStoreService::storeAdventuredays($request->activities,$packageType['adventure'], $package['id']);
                $package->packageAdventure()->delete();
                PackageStoreService::storeAdventure($request->activities,$packageType['adventure'], $daysId,$package['id']);
                // PackageStoreService::storeTransportations($request->activities,$packageType['adventure'], $package['id'],$packageType['cruise']);
            }

            if( isset($request->accommodation) && !empty($request->accommodation)){
                $package->gtaHotel()->delete();
                PackageStoreService::storeHotel($request->accommodation, $package['id']);
            }

            if (isset($request->images) && !empty($request->images)) {
                $package->packageImages()->delete();
                PackageStoreService::storePackageImages($request->images, $package);
            }


            // $package->seasons()->delete();

            // if(! empty($request->seasons)){
            //     PackageStoreService::storeSeasons($package,$request->seasons);
            // }

            // if (isset($validated['package_cities'])) {
            //     foreach ($validated['package_cities'] as $key => $packageCity) {
            //         $packageCity = $this->mergeExtraPackageCityData($validated, $key, $packageCity);

            //         PackageStoreService::storePackageCityData($package, $packageCity);
            //     }
            // }
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Package $package)
    {

        $package->packageTransportations()->delete();
        $package->packageAdventure()->delete();
        $package->packageAdventuredays()->delete();
        $package->packageHotel()->delete();
        // $package->packageActivity()->delete();
        // $package->packageTrasportation()->delete();
        $package->packageCity()->delete();
        $package->packageAbilities()->delete();

        if( $package->delete() )
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);

        return response()->json(['message' =>'operation failed', 'status' => 400]);

    }

    /** this function merge extra needed data to be stored depending on some conditions
     * @param  $validated
     * @param $key
     * @param $tripCity
     * @return array
     */
    private function mergeExtraPackageCityData($validated, $key, $packageCity){

        // return response()->json(['test' => '']);

        $packageCity = array_merge([
            'start' => false,
            'destination_city_id' => null ], $packageCity );

        if($key == array_key_first($validated['package_cities']))
            $packageCity['start'] = true;

        if($key != array_key_last($validated['package_cities']))
            $packageCity['destination_city_id'] = $validated['package_cities'][$key+1]['city_id'];

        return $packageCity;
    }

}
