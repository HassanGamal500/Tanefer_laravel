<?php

namespace App\Http\Controllers\ApiV2\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\GtaCountryResource;
use App\Http\Resources\GtaHotelCatalogueResource;
use App\Http\Resources\GtaHotelResource;
use App\Http\Resources\GtaRegionResource;
use App\Models\GtaCity;
use App\Models\GtaCountry;
use App\Models\GtaHotelCatalogue;
use App\Models\GtaHotelPortfolio;
use App\Models\GtaRegion;
use App\Models\GtaZone;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Cache;


class PackageHotelGtaController extends Controller
{

    public function store_country_gta() {
        $xmlData = file_get_contents('http://api.tanefer.com/api/v2/packages/get-zone-list');
        $result = json_decode($xmlData);
        $list = $result->ZoneListRS->ZoneList->Zone;
        foreach ($list as $record) {
            if (isset($record->AreaType) && $record->AreaType === 'PAS') {
                GtaCountry::create([
                    'name' => $record->Name,
                    'code' => $record->Code,
                    'Jpd_code' => $record->JPDCode,
                    'area_type' => $record->AreaType
                ]);
            }
        }
        return response()->json(['message' =>'Country add successfully', 'status' => 201]);
    }

    public function store_region_gta() {
        $xmlData = file_get_contents('http://api.tanefer.com/api/v2/packages/get-zone-list');
        $result = json_decode($xmlData);
        $list = $result->ZoneListRS->ZoneList->Zone;
        $countries = GtaCountry::pluck('code');
        foreach($countries as $country) {
            foreach ($list as $record) {
                if (isset($record->AreaType) && $record->AreaType === 'REG' && (isset($record->ParentCode) && $country == $record->ParentCode)) {
                    GtaRegion::create([
                        'name' => $record->Name,
                        'code' => $record->Code,
                        'Jpd_code' => $record->JPDCode,
                        'parent_Jpd_code' => $record->ParentJPDCode,
                        'parent_code' => $record->ParentCode,
                        'area_type' => $record->AreaType
                    ]);
            }
            }
        }
        return response()->json(['message' =>'Region add successfully', 'status' => 201]);
    }

    public function store_city_gta() {
        $xmlData = file_get_contents('http://api.tanefer.com/api/v2/packages/get-zone-list');
        $result = json_decode($xmlData);
        $list = $result->ZoneListRS->ZoneList->Zone;
        $regions = GtaRegion::pluck('code');
        foreach($regions as $region) {
            foreach ($list as $record) {
                if (isset($record->AreaType) && $record->AreaType === 'CTY' && isset($record->ParentCode) && $region == $record->ParentCode) {
                    GtaCity::create([
                        'name' => $record->Name,
                        'code' => $record->Code,
                        'Jpd_code' => $record->JPDCode,
                        'parent_Jpd_code' => $record->ParentJPDCode,
                        'parent_code' => $record->ParentCode,
                        'area_type' => $record->AreaType
                    ]);
            }
            }
        }
        return response()->json(['message' =>'Region add successfully', 'status' => 201]);
    }

    public function store_zone_gta() {
        $xmlData = file_get_contents('http://api.tanefer.com/api/v2/packages/get-zone-list');
        $result = json_decode($xmlData);
        $list = $result->ZoneListRS->ZoneList->Zone;
        $zones = GtaCity::pluck('code');
        // foreach($zones as $zone) {
            foreach ($list as $record) {
                if (!isset($record->AreaType) || $record->AreaType != 'CTY' || $record->AreaType != 'REG' || $record->AreaType != 'PAS') {
                    GtaZone::create([
                        'name' => $record->Name,
                        'code' => isset($record->Code) ? $record->Code : null,
                        'Jpd_code' => isset($record->JPDCode) ? $record->JPDCode : null,
                        'parent_Jpd_code' => isset($record->ParentJPDCode) ? $record->ParentJPDCode : null,
                        'parent_code' => isset($record->ParentCode) ? $record->ParentCode : null,
                        'area_type' => isset($record->AreaType) ? $record->AreaType : null
                    ]);
                }
            }
        // }
        return response()->json(['message' =>'Region add successfully', 'status' => 201]);
    }

    public function store_hotel_catalogue_data() {
        $xmlData = file_get_contents('http://api.tanefer.com/api/v2/packages/get-hotel-catalogue-data');
        $result = json_decode($xmlData);
        $list = $result->CatalogueDataRS->HotelStaticData;
        $RoomCategory = $list->RoomCategoryList->RoomCategory;
        $HotelCategory = $list->HotelCategoryList->HotelCategory;
        $HotelType = $list->HotelTypeList->HotelType;
        $Board = $list->BoardList->Board;
        $OfferSupplementType = $list->OfferSupplementTypeList->OfferSupplementType;
        $SpecialSupplementType = $list->SpecialSupplementTypeList->SpecialSupplementType;
        $arrayloop = [$RoomCategory,$HotelCategory,$HotelType, $Board, $OfferSupplementType ,$SpecialSupplementType];
        
        // GtaHotelCatalogue::truncate();
        
        foreach ($arrayloop as $record) {
            foreach ($record as $item) {
                if ($record === $SpecialSupplementType) {
                    $type = $SpecialSupplementType->Code;
                    $name = $SpecialSupplementType->_;
                } else {
                    $type = $item->Type ?? null;
                    $name = $item->_ ?? null;
                }
                if($record === $RoomCategory) {
                    $catalogue_type = 'RoomCategory';
                } else if ($record === $HotelCategory) {
                    $catalogue_type = 'HotelCategory';
                } else if ($record === $HotelType) {
                    $catalogue_type = 'HotelType';
                } else if($record === $Board) {
                    $catalogue_type = 'Board';
                } else if ($record === $OfferSupplementType) {
                    $catalogue_type = 'OfferSupplementType';
                } else {
                    $catalogue_type = 'SpecialSupplementType';
                }
                GtaHotelCatalogue::create([
                    'name' => $name,
                    'type' => $type,
                    'catalogue_type' => $catalogue_type,
                ]);
            }

        }
        return response()->json(['message' =>'hotel catalogue add successfully', 'status' => 201]);
    }
    
    public function store_hotel_portfolio() {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $page = 1;
        $xmlData = file_get_contents('http://api.tanefer.com/api/v2/packages/get-hotel?page=' . $page, false, stream_context_create($arrContextOptions));
        $result = json_decode($xmlData);
        $getHotelPortfolio = $result->HotelPortfolioRS->HotelPortfolio;
        $totalPages = $getHotelPortfolio->TotalPages > 0 ? $getHotelPortfolio->TotalPages  : 0;
        $listFirstPage = $getHotelPortfolio->Hotel;
        foreach ($listFirstPage as $item) {
            if(isset($item->Zone)) {
                $zone = GtaZone::where('Jpd_code', $item->Zone->JPDCode)->where('code', $item->Zone->Code)->first();
            }
            $hotel_catalogue = GtaHotelCatalogue::where(function ($q) use ($item) {
                $q->where('name', $item->HotelCategory->_);
                if(isset($item->HotelCategory->Type) && $item->HotelCategory->Type){
                    $q->where('type', $item->HotelCategory->Type);
                }
            })->first();
            if(isset($item->City)) {
                $city = GtaCity::where('Jpd_code', $item->City->JPDCode)->where('code', $item->City->Id)->first();
            }

            GtaHotelPortfolio::create([
                'name' => isset($item->Name) && $item->Name ? $item->Name : null,
                'Jpd_code' => isset($item->JPCode) && $item->JPCode ? $item->JPCode : null,
                'has_synonyms' => isset($item->HasSynonyms) && $item->HasSynonyms ? $item->HasSynonyms : null,
                'address' => isset($item->Address) && $item->Address ? $item->Address : null,
                'zip_code' => isset($item->ZipCode) && $item->ZipCode ? $item->ZipCode : null,
                'latitude' =>  isset($item->Latitude) && $item->Latitude ? $item->Latitude : null,
                'longitude' => isset($item->Longitude) && $item->Longitude ? $item->Longitude : null,
                'zone_id' => isset($zone) && $zone ? $zone->id : null,
                'hotel_category_id' => isset($hotel_catalogue) && $hotel_catalogue ? $hotel_catalogue->id : null,
                'city_id' => isset($city) && $city ? $city->id : null,

            ]);
        }
        $page++;

        if($totalPages > 0) {
            for(; $page <= $totalPages; $page++) {
                $xmlData = file_get_contents('http://api.tanefer.com/api/v2/packages/get-hotel?page=' . $page, false, stream_context_create($arrContextOptions));
                $result = json_decode($xmlData);
                $list = $result->HotelPortfolioRS->HotelPortfolio->Hotel;
                foreach ($list as $item) {
                    if(isset($item->Zone)) {
                        $zone = GtaZone::where('Jpd_code', $item->Zone->JPDCode)->where('code', $item->Zone->Code)->first();
                    }
                    $hotel_catalogue = GtaHotelCatalogue::where(function ($q) use ($item) {
                        $q->where('name', $item->HotelCategory->_);
                        if(isset($item->HotelCategory->Type) && $item->HotelCategory->Type){
                            $q->where('type', $item->HotelCategory->Type);
                        }
                    })->first();
                    if(isset($item->City)) {
                        $city = GtaCity::where('Jpd_code', $item->City->JPDCode)->where('code', $item->City->Id)->first();
                    }
                    GtaHotelPortfolio::create([
                        'name' => isset($item->Name) && $item->Name ? $item->Name : null,
                        'Jpd_code' => isset($item->JPCode) && $item->JPCode ? $item->JPCode : null,
                        'has_synonyms' => isset($item->HasSynonyms) && $item->HasSynonyms ? $item->HasSynonyms : null,
                        'address' => isset($item->Address) && $item->Address ? $item->Address : null,
                        'zip_code' => isset($item->ZipCode) && $item->ZipCode ? $item->ZipCode : null,
                        'latitude' =>  isset($item->Latitude) && $item->Latitude ? $item->Latitude : null,
                        'longitude' => isset($item->Longitude) && $item->Longitude ? $item->Longitude : null,
                        'zone_id' => isset($zone) && $zone ? $zone->id : null,
                        'hotel_category_id' => isset($hotel_catalogue) && $hotel_catalogue ? $hotel_catalogue->id : null,
                        'city_id' => isset($city) && $city ? $city->id : null,
                    ]);
                }
            }
        }

        return response()->json(['message' =>'hotel catalogue add successfully', 'status' => 201]);
    }

    public function get_country(){

        $country = GtaCountry::get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaCountryResource::collection( $country )
        ]);
    }
    
    public function get_region(Request $request){

        $country_code = $request->country_code;
        $region = GtaRegion::where('parent_code', $country_code)->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaRegionResource::collection( $region )
        ]);
    }
    
    public function get_city(Request $request){

        // $city_code = $request->city_code;
        $country_code = $request->country_code;
        $city = GtaCity::select('gta_cities.*')
        ->join('gta_regions', function($join) {
            $join->on('gta_cities.parent_code', '=', 'gta_regions.code');
        })->where('gta_regions.parent_code', $country_code)->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaRegionResource::collection( $city )
        ]);
    }
    
    public function get_zone(Request $request){

        $zone_code = $request->zone_code;
        $zone = GtaZone::where('parent_code', $zone_code)->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaRegionResource::collection( $zone )
        ]);
    }
    // code added to modifiy search by zone

    public function searchZones(Request $request) {
        $query = $request->input('query');

        // Cache the search results 10 mins
        $zones = Cache::remember('zones_search_' . $query, 600, function () use ($query) {
            return DB::table('gta_zones')
                ->select('gta_zones.id', 'gta_zones.name', 'gta_zones.jpd_code', 'parent.name as parent_name', 'grandparent.name as grandparent_name', 'area_type')
                ->leftJoin('gta_zones as parent', 'gta_zones.parent_code', '=', 'parent.code')
                ->leftJoin('gta_zones as grandparent', 'parent.parent_code', '=', 'grandparent.code')
                ->whereRaw("MATCH(gta_zones.name) AGAINST(? IN BOOLEAN MODE)", [$query])
                ->orWhere('gta_zones.name', 'LIKE', '%' . $query . '%')
                ->limit(50)
                ->get();
        });

        return response()->json($zones);
    }

    // end of new code
    
    public function get_hotel_catalogues(){

        $hotel_catalogues = GtaHotelCatalogue::where('catalogue_type', 'HotelCategory')->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaHotelCatalogueResource::collection( $hotel_catalogues )
        ]);
    }
    
    public function get_hotel_categories(){

        $hotel_catalogues = GtaHotelCatalogue::where('catalogue_type', 'HotelCategory')->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaHotelCatalogueResource::collection( $hotel_catalogues )
        ]);
    }
    
    public function get_hotel_type_categories(){

        $hotel_catalogues = GtaHotelCatalogue::where('catalogue_type', 'HotelType')->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaHotelCatalogueResource::collection( $hotel_catalogues )
        ]);
    }
    
    public function get_room_categories(){

        $hotel_catalogues = GtaHotelCatalogue::where('catalogue_type', 'RoomCategory')->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaHotelCatalogueResource::collection( $hotel_catalogues )
        ]);
    }
    
    public function get_hotel_boards(){

        $hotel_catalogues = GtaHotelCatalogue::where('catalogue_type', 'Board')->get();

        return response()->json([ 'message' =>'success','status' => 200,
            'data'=> GtaHotelCatalogueResource::collection( $hotel_catalogues )
        ]);
    }

    // public function get_hotel(Request $request){

    //     $zone_id = $request->zone_id ?? null;
    //     $hotel_category_id  = $request->hotel_category_id ?? null;
    //     $city_id = $request->city_id ?? null;
    //     $hotel = GtaHotelPortfolio::query();

    //     if($zone_id && $zone_id != null && $zone_id != 'null' && $zone_id != '') {
    //         $hotel->where('zone_id',$zone_id);
    //     }
    //     if($hotel_category_id && $hotel_category_id != null && $hotel_category_id != 'null' && $hotel_category_id != '') {
    //         $hotel->where('hotel_category_id',$hotel_category_id);
    //     }
    //     if($city_id && $city_id != null && $city_id != 'null' && $city_id != '') {
    //         $hotel->where('city_id',$city_id);
    //     }

    //     $hotel_data = $hotel->get();

    //     return response()->json([ 'message' =>'success','status' => 200,
    //         'data'=> GtaHotelResource::collection( $hotel_data )
    //     ]);
    // }
        // Fetch city by jpd_code
        public function get_city_by_jpd_code(Request $request)
        {
            $jpd_code = $request->jpd_code;
            $city = GtaCity::where('jpd_code', $jpd_code)->first();

            if ($city) {
                return response()->json(['city_id' => $city->id], 200);
            } else {
                return response()->json(['message' => 'City not found'], 404);
            }
        }
// HotelController.php

        public function search_hotels_by_address(Request $request)
        {
            $addressFragment = $request->input('address_fragment');

            if (!$addressFragment) {
                return response()->json(['message' => 'Address fragment is required'], 400);
            }

            $hotels = GtaHotelPortfolio::where('address', 'LIKE', '%' . $addressFragment . '%')->get();

            if ($hotels->isEmpty()) {
                return response()->json(['message' => 'No hotels found'], 404);
            }

            return response()->json([
                'message' => 'success',
                'status' => 200,
                'data' => GtaHotelResource::collection($hotels)
            ]);
        }

        public function get_hotel(Request $request)
        {
            $zone_id = $request->zone_id ?? null;
            $hotel_category_id = $request->hotel_category_id ?? null;
            $city_id = $request->city_id ?? null;
            $address_fragment = $request->address_fragment ?? null;
            
            $hotel = GtaHotelPortfolio::query();
        
            // If city_id is present, search by city
            if (!empty($city_id)) {
                $hotel->where('city_id', $city_id);
            }
            // If searching by address (REG area type)
            elseif (!empty($address_fragment)) {
                $hotel->where('address', 'LIKE', '%' . $address_fragment . '%');
            }
            // If zone_id is provided, use the default zone search
            elseif (!empty($zone_id)) {
                $hotel->where('zone_id', $zone_id);
            }
        
            if (!empty($hotel_category_id)) {
                $hotel->where('hotel_category_id', $hotel_category_id);
            }
        
            $hotel_data = $hotel->get();
        
            return response()->json([
                'message' => 'success',
                'status' => 200,
                'data' => GtaHotelResource::collection($hotel_data)
            ]);
        }
    }        