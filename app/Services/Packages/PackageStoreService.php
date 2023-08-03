<?php


namespace App\Services\Packages;


use App\Models\PackageAvailability;
use App\Models\PackageBookingadventrue;
use App\Models\PackageBookingDays;
use App\Models\PackageCity;
use App\Models\PackageCityTransportation;
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
    public static function availAbilities($package_id,$availabilties)
    {
        $availabilityIds = [];
        foreach ($availabilties as $avail){
            if (is_array($avail)) {
                $availability = PackageAvailability::create([
                    'from_date' => $avail['from_date'],
                    'to_date'   => $avail['to_date'],
                    'days'   => json_encode($avail['days']),
                    'package_id'   => $package_id,
                ]);

                $availabilityIds[] = $availability->id;
            }
        }
        return $availabilityIds;

    }
    public static function storeAdventureOrCruise($package_id,$activities)
    {
        $i = 1;
        $bookingIds = [];
        $cruiseIds = [];
        foreach ($activities as $activity){
            if (is_array($activity)) {
                $booking = PackageCity::create([
                    'package_id'   => $package_id,
                    'tour_city_id'=> $activity['city_id'],
                    'start'=> $i,
                    'days_number'=> $activity['days_number'],
                    'type'=> $activity['type'],
                    'cruise_id'=> isset($activity['cruise_id']) ? $activity['cruise_id'] : null,
                ]);
                if ($activity['type'] === "adventure") {
                    $bookingIds[] = $booking->id;
                } elseif ($activity['type'] === "cruise") {
                    $cruiseIds[] = $booking->id;
                }

                if (! empty($activity['transportation'] != null)) {
                    foreach ($activity['transportation'] as $adv) {

                        PackageCityTransportation::create([
                            'package_id'        => $package_id,
                            'package_city_id'   => $booking->id,
                            'type'              => $adv['type'],
                            'price_per_person'  => $adv['price_per_person'],
                        ]);
                    }
                }

            }
            $i++;
        }

        return ['adventure' => $bookingIds, 'cruise' => $cruiseIds];
    }
    public static function storeAdventuredays($activities, $availabilityIds, $package_id)
    {
        $i = 1;
        $availabilityIndex = 0;
        $bookingdays = [];
        foreach ($activities as $availability) {

            if(! empty($availability['days'] != null)){
                foreach ((array)$availability['days'] as $adv) {
                    $package_activity_id = $availabilityIds[$availabilityIndex];
                    $daydata = PackageBookingDays::create([
                        'package_id'        => $package_id,
                        'day_number'        => $adv['day_number'],
                        'start'             => $i,
                        'package_city_id'   => $package_activity_id,
                    ]);
                    $i++;
                    $bookingdays[] = $daydata->id;
                }
            }
            $availabilityIndex++;
        }
        return $bookingdays;

    }

    public static function storeAdventure($activities, $availabilityIds,$daysId, $package_id)
    {
        $availabilityIndex = 0;
        $daysIndex = 0;
        foreach ($activities as $availability) {
            if(! empty($availability['days'] != null)){
                foreach ((array)$availability['days'] as $adv) {
                    foreach ((array)$adv['adventrues'] as $adventrue) {
                        $package_activity_id = $availabilityIds[$availabilityIndex];
                        $package_day_id = $daysId[$daysIndex];
                        PackageBookingadventrue::create([
                            'package_id'   => $package_id,
                            'package_city_id' => $package_activity_id,
                            'package_day_id' => $package_day_id,
                            'adventrue_id'   => $adventrue['adventrue_id'],
                        ]);
                    }
                $daysIndex++;

                }
            }
            $availabilityIndex++;
        }
    }
    // public static function storeTransportations($activities, $availabilityIds, $package_id, $bookingIds)
    // {
    //     $availabilityIndex = 0;
    //     $bookingIndex = 0;

    //     foreach ($activities as $availability) {
    //         if (! empty($availability['transportation'] != null)) {
    //             foreach ($availability['transportation'] as $adv) {

    //                 if ($availability['type'] === 'cruise') {
    //                     $package_activity_id = $bookingIds[$bookingIndex];
    //                     $bookingIndex++;
    //                 } else {

    //                     $package_activity_id = $availabilityIds[$availabilityIndex];
    //                     $availabilityIndex++;
    //                 }
    //                 if ($package_activity_id !== null) {
    //                     PackageCityTransportation::create([
    //                         'package_id'        => $package_id,
    //                         'package_city_id'   => $package_activity_id,
    //                         'type'              => $adv['type'],
    //                         'price_per_person'  => $adv['price_per_person'],
    //                     ]);
    //                 }
    //             }
    //         }
    //     }
    // }

    public static function collectPackageMainData($validatedData){
        $data = [
            'occupancy'                     => $validatedData['package_occupancy'] ?? null,
            'starting_airport'              => array_key_exists('package_starting_airport',$validatedData) ? $validatedData['package_starting_airport'] : null,
            'title'                         => $validatedData['package_title'],
            'overview'                      => $validatedData['package_overview'],
            'nights_number'                 => $validatedData['package_nights_number'],
            'duration'                      => $validatedData['package_duration'],
            'additional_price'              => $validatedData['additional_price'],
            'discount_precentage'           => $validatedData['discount_precentage'],
            'price_per_person'              => $validatedData['package_price_per_person'] ?? 0,
            'start_date'                    => $validatedData['package_start_date'] ??null,
            'international_flight'              => 0,
            'includes'                      => $validatedData['package_includes'] ? json_encode( $validatedData['package_includes'] ) : null,
            'excludes'                      => $validatedData['package_excludes'] ? json_encode( $validatedData['package_excludes'] ) : null,
            'is_top'                            => array_key_exists('is_top',$validatedData) ? $validatedData['is_top'] : 0,
            'rank'                            => array_key_exists('rank',$validatedData) ? $validatedData['rank'] : 0,
            'start_days'                      => array_key_exists('start_days',$validatedData) ? strtolower(implode(',',$validatedData['start_days'])) : '',
            'slug'                            => $validatedData['slug'],
            'image_alt'                       => array_key_exists('image_alt',$validatedData) ? $validatedData['image_alt'] : null,
            'image_caption'                   => array_key_exists('image_caption',$validatedData) ? $validatedData['image_caption'] : null,
            'seo_title'                       => array_key_exists('meta_title',$validatedData) ? $validatedData['meta_title'] : $validatedData['package_title'],
            'meta_description'                => array_key_exists('meta_desc',$validatedData) ? $validatedData['meta_desc'] : null,
            'cruise_id'                      => array_key_exists('cruise_id',$validatedData)? $validatedData['cruise_id'] : null
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
            'min_days'          => array_key_exists('min_days',$validatedData) ? $validatedData['min_days'] : 0,
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
            'price_per_person'     => $validatedData['price_per_person'],
            'destination_city_id'  => $validatedData['destination_city_id']
        ];
    }

    public static function storePackageImages($images,$package)
    {
        if(is_array($images)){
            foreach ($images as $image){
                $package->packageImages()->create([
                    'image' => 'hjk',
                    // 'image' => StoreFileService::SaveFile('package/'.$package->id.'/images',$image),
//                    'image_alt' => array_key_exists('image_alt',$image) ? $image['image_alt'] : null,
//                    'image_caption' => array_key_exists('image_caption',$image) ? $image['image_caption'] : null
                ]);
            }
        }
    }
}
