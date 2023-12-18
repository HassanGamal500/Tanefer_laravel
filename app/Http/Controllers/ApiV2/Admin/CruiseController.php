<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CruiseChildrenPolicy;
use App\Http\Requests\CruiseRequest;
use App\Http\Resources\Admin\PackageHotelchildrenResource;
use App\Models\Cruise;
use App\Models\CruiseImage;
use App\Services\Packages\CruiseStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CruiseController extends Controller
{

    public function listOfCruises($cityId)
    {
        $cruises = Cruise::select('id','name')->whereHas('cities', function ($q) use ($cityId) {
            $q->where('tour_cities.id', $cityId)->where('cruise_tour_city.is_start',1);
        })->get();

        return response()->json(['data' => $cruises]);
    }


    public function index(Request $request)
    {
        $rowPerPage = $request->row_per_page ?? 10;
        $cruiseQuery = Cruise::query();

        $cruises = $cruiseQuery->paginate($rowPerPage);

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> [
                'CruiseTotal'=> $cruises->total(),
                'CruiseList'=> $cruises
            ]
        ]);
    }

    public function show($id)
    {
        $cruise = Cruise::with(['images','rooms','cities'])->where('id',$id)->first();
        // $cruise = Cruise::with(['images','rooms','cities','packageHotelChildren'])->where('id',$id)->first();
        return [
            'cruise' => $cruise,
            // 'cruiseChildrenPolicies' => PackageHotelchildrenResource::collection($cruise->packageHotelChildren)
        ];
    }

    public function store(CruiseRequest $request) {
        $validated = $request->validated();
        DB::transaction(function () use ($validated) {
            $cruise = CruiseStoreService::storeCruiseData($validated, null);
            $cruise->cities()->attach($validated['start_city_id'], ['is_start' => 1]);
            $cruise->cities()->attach($validated['cities_ids']);

            if (array_key_exists('images', $validated)) {
                CruiseStoreService::storeCruiseImages($validated['images'], $cruise);
            }

            if (array_key_exists('rooms', $validated)) {
                $cruiseService = new CruiseStoreService();
                $cruise_id = CruiseStoreService::StoreCruiseRooms($validated['rooms'], $cruise);
                // $cruiseService->storeChildrenData($validated['rooms'], $cruise->id, $cruise_id);
            }
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function childrenPolicy(CruiseChildrenPolicy $request)
    {
        $validated = $request->validated();
        DB::transaction(function () use ($validated ) {
           CruiseStoreService::storeCruiseChildrenData($validated);
        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function update(CruiseRequest  $request, $id)
    {
        $cruise = Cruise::findOrFail($id);
        $validated = $request->validated();
        DB::transaction(function () use ( $cruise, $validated ,$request ) {

            $cruise->update( CruiseStoreService::collectCruiseData($validated, $cruise));

            foreach ($validated['rooms'] as $room){
                // $cruise_id = CruiseStoreService::UpdatePackageHotelRoomData($cruise,$room);
                $cruise->packageHotelRoom()->delete();
                $cruise_id = CruiseStoreService::StoreCruiseRooms($validated['rooms'], $cruise);

                $cruise->cruiseChildrenPackage()->delete();
                $cruiseService = new CruiseStoreService();
                $cruiseService->storeChildrenData($validated['rooms'], $cruise->id, $cruise_id);
            }

            if($request->images){
                CruiseStoreService::storeCruiseImages($request->images,$cruise);
            }

        });

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }

    public function removeImage($id)
    {
        $cruiseImage = CruiseImage::findOrFail($id);

        Storage::delete($cruiseImage->getAttributes()['image']);

        $cruiseImage->delete();

        return response()->json(['message' =>'operation done successfully', 'status' => 200]);
    }
}
