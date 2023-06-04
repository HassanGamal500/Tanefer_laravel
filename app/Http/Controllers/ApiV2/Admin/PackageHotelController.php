<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageHotelRequest;
use App\Http\Requests\Admin\PackageHotelChildrenRequest;

use App\Http\Resources\Admin\PackageHotelListResource;
use App\Http\Resources\Admin\PackageHotelResource;
use App\Http\Resources\Admin\PackageHotelRoomResource;
use App\Http\Resources\Admin\PackageHotelSeasonResource;
use App\Http\Resources\Admin\PackageHotelchildrenResource;
use App\Http\Resources\TourCityResource;
use App\Models\PackageHotel;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelSeason;
use App\Models\TourCity;
use App\Services\Packages\PackageHotelStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $rowPerPage = $request->row_per_page ?? 10;
        $packageHotelQuery = PackageHotel::query();
        if($request->city_id )
            $packageHotelQuery->where('tour_city_id',$request->city_id);

        $packageHotel = $packageHotelQuery->paginate($rowPerPage);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> [
                'hotelTotal'=> $packageHotel->total(),
                'hotelList'=> PackageHotelResource::collection( $packageHotel )
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
                'cities'    => TourCityResource::collection(TourCity::all() ),
                'seasons'   => PackageHotelSeasonResource::collection(PackageHotelSeason::all() ),
            ]
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PackageHotelRequest $request)
    {
        $validated = $request->validated();
        DB::transaction(function () use ($request , $validated ) {
            $packageHotel = PackageHotelStoreService::storePackageHotelMainData( $validated);

            foreach ($validated['rooms'] as $room){
                PackageHotelStoreService::storePackageHotelRoomData($packageHotel , $room );
            }

            if ($request->hotel_images) {
                PackageHotelStoreService::storePackageHotelImages($packageHotel,$request->hotel_images);
            }
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);

    }

    public function childrenPolicy(PackageHotelChildrenRequest $request)
    {
        $validated = $request->all();
        DB::transaction(function () use ($request , $validated ) {
            $packageHotelch = PackageHotelStoreService::storePackageHotelChildrenData($validated);

        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);

    }


    /**
     * Show the full details of the specified resource.
     *
     * @param  \ App\Models\PackageHotel $packageHotel
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $packageHotel = PackageHotel::findOrFail($id);

        $packageHotel->load('tourCity','packageHotelImages','packageHotelRooms','packageHotelChildren');
        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> new PackageHotelResource( $packageHotel )
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ App\Models\PackageHotel $packageHotel
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PackageHotelRequest $request, PackageHotel $packageHotel)
    {
        $validated = $request->validated();
        DB::transaction(function () use ($request , $validated,$packageHotel ) {
            $packageHotel->update( PackageHotelStoreService::collectPackageHotelMainData( $validated) );


            foreach ($validated['rooms'] as $room){
                PackageHotelStoreService::UpdatePackageHotelRoomData($packageHotel , $room );
            }
            if ($request->hotel_images) {

                PackageHotelStoreService::storePackageHotelImages($packageHotel,$request->hotel_images);
            }
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ App\Models\PackageHotel $packageHotel
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(PackageHotel $packageHotel)
    {
        $packageHotel->packageHotelRooms()->delete();
        $packageHotel->packageHotelImages()->delete() ;
        if( $packageHotel->delete() )
            return response()->json(['message' =>'operation done successfully', 'status' => 200]);

        return response()->json(['message' =>'operation failed', 'status' => 400]);

    }


    /**
     * Return list of Hotels filtered by city id without pagination.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function hotelFilteredByCity(Request $request){

        $packageHotelQuery = PackageHotel::query();
        if($request->city_id )
            $packageHotelQuery->where('tour_city_id',$request->city_id);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> PackageHotelListResource::collection( $packageHotelQuery->get() )
        ]);
    }

    /**
     * Return list of Rooms filtered by hotel id without pagination.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function hotelRoomsFilteredByHotel(Request $request){

        $packageHotelRoomQuery = PackageHotelRoom::query();
        if($request->hotel_id )
            $packageHotelRoomQuery->where('package_hotel_id',$request->hotel_id);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> PackageHotelRoomResource::collection( $packageHotelRoomQuery->get() )
        ]);
    }
}
