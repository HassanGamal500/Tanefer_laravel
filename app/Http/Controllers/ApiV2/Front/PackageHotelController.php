<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageHotelResource;
use App\Http\Resources\Admin\PackageHotelResource as PackageHotelDetailsResource;
use App\Models\PackageHotel;
use App\Services\Packages\SearchService;
use App\Services\Packages\CalculateFullPriceService;
use Illuminate\Http\Request;

class PackageHotelController extends Controller
{
    public function index (Request $request)
    {
        $childrenages = explode(',',$request->childrenages);
        if (sizeof($childrenages) > $request->child_number){
            while (sizeof($childrenages) != $request->child_number){
                array_pop($childrenages);
            }
        }
        $rowPerPage = $request->row_per_page ?? 10;
        $packageHotelQuery =  SearchService::hotelSearch ($request->city_id);

        $packageHotel = $packageHotelQuery->paginate($rowPerPage);

        return responseJson($request,[
            'hotelTotal'=> $packageHotel->total(),
            'hotelList'=> PackageHotelResource::collection( $packageHotel ),
        ],'success');
    }


    public function details(PackageHotel $packageHotel,Request $request)
    {
        $childrenages = explode(',',$request->Childrenages);
        if (sizeof($childrenages) > $request->child_number){
            while (sizeof($childrenages) != $request->child_number){
                array_pop($childrenages);
            }
        }
        $packageHotel->load('tourCity','packageHotelImages','packageHotelRooms');
//        $packageHotel->load(['packageHotelRooms'=> function ($query) use ($request) {
//            $query->where('max_num_children', '>=', $request->child_number)->where('max_num_adult','>=',$request->adult_number);
//        }]);

        $packageHotelResource = new PackageHotelDetailsResource( $packageHotel );

        if ($request->child_number > 0){
            $FinalPackage = CalculateFullPriceService::calculate($packageHotelResource, $request->adult_number, $request->child_number, $childrenages);

           return  responseJson($request,$FinalPackage,'success');
        }
        else{
            return responseJson($request,$packageHotelResource,'success');
        }

    }
}
