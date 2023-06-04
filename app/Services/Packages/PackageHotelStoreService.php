<?php


namespace App\Services\Packages;


use App\Models\PackageHotel;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelChildren;

use App\Models\PackageHotelSeason;
use App\Services\StoreFileService;

class PackageHotelStoreService
{
    public static function storePackageHotelMainData( $validatedData ){
        return  PackageHotel::create(
            self::collectPackageHotelMainData($validatedData)
        );
    }

    public static function storePackageHotelRoomData( $packageHotel,$roomData ){
        $packageHotelRoom = PackageHotelRoom::create(
            self::collectPackageHotelRoomData($packageHotel,$roomData )
        );
        self::collectPackageHotelRoomSeasonData($roomData,$packageHotelRoom);

        return true;
    }

      public static function storePackageHotelChildrenData($validatedData ){
        return  PackageHotelChildren::updateOrCreate(
              ['model_id'=> $validatedData['hotel_id'],
                  'occupancy'=> $validatedData['occupancy'],
                  'model_type' => get_class(new PackageHotel())
                  ],
            self::collectPackageHotelChildrenData($validatedData)
        );
    }


    public static function storePackageHotelImages($packageHotel,$images){
        $imagePath =[];
        foreach ($images as  $image) {
            $imagePath ['image']=   StoreFileService::SaveFile('hotel/images',$image );
            $packageHotel->packageHotelImages()->create($imagePath) ;
        }

        return true;

    }

    public static function UpdatePackageHotelRoomData( $packageHotel,$validatedData ){
        $packageHotelRoom = PackageHotelRoom::updateOrCreate(
            ['id'=> $validatedData['room_id'] ],
            self::collectPackageHotelRoomData($packageHotel,$validatedData )
        );
        self::collectPackageHotelRoomSeasonData($validatedData,$packageHotelRoom);

        return true;
    }

    public static function collectPackageHotelMainData($validatedData){

        $data = [
            'name'              => $validatedData['hotel_name'],
            'address'           => $validatedData['hotel_address'],
            'description'       => $validatedData['hotel_description'],
            'stars'             => $validatedData['hotel_stars'],
            'phone'             => $validatedData['hotel_phone'],
            'tour_city_id'      => $validatedData['hotel_city_id'],
            'facilities'        => json_encode( $validatedData['hotel_facilities'] ),
            'policies'          => json_encode( $validatedData['hotel_policies'] ) ,

            'latitude'          => $validatedData['hotel_latitude'] ?? null,
            'longitude'         => $validatedData['hotel_longitude']?? null,
        ];
        if( array_key_exists('hotel_image',$validatedData) )
            $data ['image']  =  StoreFileService::SaveFile('hotel/banner',$validatedData['hotel_image']);

        return $data ;
    }
    public static function collectPackageHotelChildrenData($validatedData){

        $first_child  = $validatedData['first_child'] ;
        $second_child  = $validatedData['second_child'] ;
        $data = [
            'hotel_id'=>$validatedData['hotel_id'],
            'occupancy'=>$validatedData['occupancy'],
            'first_child_1' =>$first_child['child_1'],
            'first_child_2' =>$first_child ['child_2'],
            'first_child_3' =>$first_child ['child_3'],
            'first_child_4' =>$first_child ['child_4'],
            'first_child_5' =>$first_child ['child_5'],
            'first_child_6' =>$first_child ['child_6'],
            'first_child_7' =>$first_child ['child_7'],
            'first_child_8' =>$first_child ['child_8'],
            'first_child_9' =>$first_child ['child_9'],
            'first_child_10' =>$first_child ['child_10'],
            'first_child_11' =>$first_child ['child_11'],


            'second_child_1' =>$second_child['child_1'],
            'second_child_2' =>$second_child ['child_2'],
            'second_child_3' =>$second_child ['child_3'],
            'second_child_4' =>$second_child ['child_4'],
            'second_child_5' =>$second_child ['child_5'],
            'second_child_6' =>$second_child ['child_6'],
            'second_child_7' =>$second_child ['child_7'],
            'second_child_8' =>$second_child ['child_8'],
            'second_child_9' =>$second_child ['child_9'],
            'second_child_10' =>$second_child ['child_10'],
            'second_child_11' =>$second_child ['child_11'],

        ];

        return $data ;
    }
    private static function collectPackageHotelRoomData($packageHotel,$roomData ){
        return [
            'type'              => $roomData['type'],
            'max_num_adult'     => $roomData['max_num_adult'],
            'occupancy'         => $roomData['occupancy'],
            'max_num_children'  => $roomData['max_num_children'],
            'inclusions'        => json_encode( $roomData['inclusions'] ),
            'amenities'         => json_encode( $roomData['amenities'] ),
            'categories'        => json_encode( $roomData['categories'] ),
            'model_id'          => $packageHotel->id,
            'model_type'        => get_class($packageHotel)

        ];
    }

    private static function collectPackageHotelRoomSeasonData($roomData,$packageHotelRoom)
    {
        $hotelRoomSeason = [];
        if(array_key_exists('seasons',$roomData)){
            foreach ($roomData['seasons'] as $season){
                $seasonObject = PackageHotelSeason::find($season['id']);
                if($season != null) {
                    $packageHotelRoom->packageHotelRoomSeason()->updateOrCreate([
                        'package_hotel_season_id' => $season['id']
                    ],[
                        'package_hotel_season_id'       => $seasonObject->id,
                        'start_date'                    => $seasonObject->start_date,
                        'end_date'                      => $seasonObject->end_date,
                        'price_per_day'                 => $season['price_per_person'],
                        'package_hotel_room_id'         => $packageHotelRoom->id,
                        'created_at'                    => now(),
                        'updated_at'                    => now()
                    ]);
                }
            }
        }

        return $hotelRoomSeason;

    }
}
