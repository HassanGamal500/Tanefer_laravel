<?php


namespace App\Services\Packages;


use App\Models\PackageHotelRoom;
use App\Models\Package;
use App\Services\StoreFileService;
use Carbon\Carbon;

class PackageStoreService
{
    public static function storePackageMainData( $validatedData ){
        $package = Package::create(
            self::collectPackageMainData($validatedData)
        );

        if(array_key_exists('images',$validatedData)){
            self::storePackageImages($validatedData['images'],$package);
        }

        return $package;
    }

    public static function storePackageCityData($package, $validatedData ){

        $packageCity =  $package->packageCity()->create(self::collectPackageCityData($validatedData));
        if (array_key_exists('hotel_id',$validatedData)){
            if ($validatedData['hotel_id']){
                $packageCity->packageCityHotel()->create(self::collectPackageCityHotelData($validatedData));
            }
        }
        if (array_key_exists('activity',$validatedData)){
            foreach ( $validatedData['activity'] as $key => $activity){
                $packageCity->packageCityActivity()->create(self::collectPackageCityActivityData($activity));
            }
        }
        if (array_key_exists('transportation',$validatedData)){
            foreach ( $validatedData['transportation'] as $key => $transportation) {
                $transportation ['destination_city_id' ] = $validatedData['destination_city_id'];

                $packageCity->packageCityTrasportation()
                    ->create( self::collectPackageCityTransportationData($transportation) );
            }
        }
        return true;
    }

    public static function storeSeasons($package,$seasons)
    {
        foreach ($seasons as $season){
            $package->seasons()->create([
                'from' => $season['from'],
                'to'   => $season['to']
            ]);
        }
    }

    public static function collectPackageMainData($validatedData){
        $data = [
            'occupancy'                     => $validatedData['package_occupancy'] ?? null,
            'starting_airport'              => array_key_exists('package_starting_airport',$validatedData) ? $validatedData['package_starting_airport'] : null,
            'title'                         => $validatedData['package_title'],
            'overview'                      => $validatedData['package_overview'],
            'nights_number'                 => $validatedData['package_nights_number'],
            'duration'                      => $validatedData['package_duration'],
            'price_per_person'              => $validatedData['package_price_per_person'] ?? 0,
            'start_date'                    => $validatedData['package_start_date'] ??null,
            'additional_cost'               => array_key_exists('additional_cost',$validatedData) ? $validatedData['additional_cost'] : null,
            'expected_price'                => array_key_exists('expected_price',$validatedData) ? $validatedData['expected_price'] : null,
            'solo_packageprice'                => array_key_exists('solo_packageprice',$validatedData) ? $validatedData['solo_packageprice'] : null,
            'Limo_packageprice'                => array_key_exists('Limo_packageprice' ,$validatedData) ? $validatedData['Limo_packageprice'] : null,
            'Caster_packageprice'                => array_key_exists('Caster_packageprice',$validatedData) ? $validatedData['Caster_packageprice'] : null,
            'HiAC_packageprice'                => array_key_exists('HiAC_packageprice',$validatedData) ? $validatedData['HiAC_packageprice'] : null,
            'bus_packageprice'                => array_key_exists('bus_packageprice',$validatedData) ? $validatedData['bus_packageprice'] : null,
            'children_percentage'                => array_key_exists('children_percentage',$validatedData) ? $validatedData['children_percentage'] : null,
            'international_flight'              => 0,
            'single_supplement_percentage'      => array_key_exists('single_supplement_percentage',$validatedData) ?
                $validatedData['single_supplement_percentage'] ?? 0.0 : 0.0,
            'is_top'                            => array_key_exists('is_top',$validatedData) ? $validatedData['is_top'] : 0,
            'rank'                            => array_key_exists('rank',$validatedData) ? $validatedData['rank'] : 0,
            'start_days'                      => array_key_exists('start_days',$validatedData) ? strtolower(implode(',',$validatedData['start_days'])) : '',
           // 'includes'                      => $validatedData['trip_includes'] ? json_encode( $validatedData['trip_includes'] ) : null,
           // 'excludes'                      => $validatedData['trip_excludes'] ? json_encode( $validatedData['trip_excludes'] ) : null,
            'slug'                            => $validatedData['slug'],
            'image_alt'                       => array_key_exists('image_alt',$validatedData) ? $validatedData['image_alt'] : null,
            'image_caption'                   => array_key_exists('image_caption',$validatedData) ? $validatedData['image_caption'] : null,
            'seo_title'                       => array_key_exists('meta_title',$validatedData) ? $validatedData['meta_title'] : $validatedData['package_title'],
            'meta_description'                => array_key_exists('meta_desc',$validatedData) ? $validatedData['meta_desc'] : null,
            'limo_children_percentage'        => array_key_exists('limo_children_percentage',$validatedData) ? $validatedData['limo_children_percentage']: 0,
            'hiac_children_percentage'        => array_key_exists('hiac_children_percentage',$validatedData) ? $validatedData['hiac_children_percentage']: 0,
            'caster_children_percentage'        => array_key_exists('caster_children_percentage',$validatedData) ? $validatedData['caster_children_percentage']: 0,
            'bus_children_percentage'        => $validatedData['bus_children_percentage'] ??  0,
            'cruise_id'                      => array_key_exists('cruise_id',$validatedData)?
                $validatedData['cruise_id'] : null
            ];
        if( array_key_exists('package_image',$validatedData) ){
            $data['image']   =  StoreFileService::SaveFile('package/banner', $validatedData['package_image']);
        }


        return $data;
    }

    public static function collectPackageCityData($validatedData){
        $data = [
            'tour_city_id'     => $validatedData['city_id'],
            'days_number'       => array_key_exists('city_day_number',$validatedData) ? $validatedData['city_day_number'] : 0,
            'duration'          => array_key_exists('city_duration',$validatedData) ? $validatedData['city_duration'] : 0,
            'start'             => array_key_exists('start',$validatedData) ? $validatedData['start'] : 0,
        ];

        return $data;
    }

    public static function collectPackageCityHotelData($validatedData){
        return [
            //'package_hotel_rooms_id'     => $validatedData['room_id'],
            'package_hotel_id'           => $validatedData['hotel_id'],
        ];
    }

    public static function collectPackageCityActivityData($validatedData){
        return [
            'package_activity_id'     => $validatedData['id'],
            'day_number'              => $validatedData['day_number'],
           // 'day_date'                => $validatedData['day_date'] ?? null
        ];
    }

    public static function collectPackageCityTransportationData($validatedData){
        return [
            'type'                 => $validatedData['type'],
            'date'                 => carbon::createFromDate(  $validatedData['date'] )->format('Y-m-d'),
            'price_per_person'     => $validatedData['price_per_person'],
            'destination_city_id'  => $validatedData['destination_city_id']
        ];
    }

    public static function storePackageImages($images,$package)
    {
        if(is_array($images)){
            foreach ($images as $image){
                $package->packageImages()->create([
                    'image' => StoreFileService::SaveFile('package/'.$package->id.'/images',$image),
//                    'image_alt' => array_key_exists('image_alt',$image) ? $image['image_alt'] : null,
//                    'image_caption' => array_key_exists('image_caption',$image) ? $image['image_caption'] : null
                ]);
            }
        }
    }
}
