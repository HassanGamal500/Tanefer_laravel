<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageCalculateTotalPriceRequest;
use App\Http\Resources\Admin\PackageResource;
use App\Http\Resources\Admin\PackageResource as PackageDetailsResource;
use App\Models\Package;
use App\Models\PackageSlugHistory;
use Illuminate\Http\Request;

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
                    return responseJson(\request(),new PackageDetailsResource ( $trip ),'redirect to the correct package',
                        301,['prices' => $prices,'slug' => $trip->slug]);
                }else{
                    return responseJson(\request(), new \stdClass(),'Package Not found',404);
                }
            }
        }

        $prices = ['solo'=>$trip->solo_packageprice,'limo'=>$trip->Limo_packageprice,'hiac'=>$trip->HiAC_packageprice,'caster'=>$trip->Caster_packageprice
        ,'bus'=>$trip->bus_packageprice,'children_percentage'=>$trip->children_percentage];

        return responseJson(\request(),new PackageDetailsResource ( $trip ),'success',200,['prices' => $prices]);
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


}
