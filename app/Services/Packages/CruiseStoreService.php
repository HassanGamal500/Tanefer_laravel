<?php

namespace App\Services\Packages;

use App\Models\Cruise;
use App\Models\PackageHotelChildren;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelSeason;
use App\Services\StoreFileService;

class CruiseStoreService
{
    public static function storeCruiseData($validateData)
    {
        return Cruise::create(
            self::collectCruiseData($validateData)
        );
    }

    public static function StoreCruiseRooms($rooms, $cruise)
    {
        foreach ($rooms as $room) {
            $cruiseRoom = PackageHotelRoom::create(
                self::collectCruiseRoomData($room, $cruise)
            );
            self::collectCruiseRoomSeasonData($room, $cruiseRoom);
        }
    }

    public static function storeCruiseImages($images, $cruise)
    {
        foreach ($images as $image) {
            $imagePath = StoreFileService::SaveFile('cruises', $image);
            $cruise->images()->create([
                'image' => $imagePath,
            ]);
        }
    }

    public static function storeCruiseChildrenData($validated)
    {
        return  PackageHotelChildren::updateOrCreate(
            ['model_id'=> $validated['cruise_id'],
                'occupancy'=> $validated['occupancy'],
                'model_type' => get_class(new Cruise())
            ],
            self::collectCruiseChildrenData($validated)
        );
    }

    public static function UpdatePackageHotelRoomData( $cruise,$room )
    {
        $cruiseRoom = PackageHotelRoom::updateOrCreate(
            ['id'=> $room['room_id'] ?? 0 ],
            self::collectCruiseRoomData($room, $cruise )
        );
        self::collectCruiseRoomSeasonData($room,$cruiseRoom);

        return true;
    }

    public static function collectCruiseData($validatedData) : array
    {
        $data = [
            'name' => $validatedData['name'],
            'cruise_line' => array_key_exists('cruise_line', $validatedData) ? $validatedData['cruise_line'] : null,
            'ship_name'   => array_key_exists('ship_name', $validatedData) ? $validatedData['ship_name'] : null,
            'facilities'  => array_key_exists('facilities',$validatedData) ? implode(',',$validatedData['facilities']) : null,
            'description' => array_key_exists('description', $validatedData) ? $validatedData['description'] : null,
            'policies'   =>  array_key_exists('policies',$validatedData) ? implode(',',$validatedData['policies']) : null,
            'excludes'   => array_key_exists('excludes',$validatedData) ? implode(',',$validatedData['excludes']) : null,
            'includes'   => array_key_exists('includes',$validatedData) ? implode(',',$validatedData['includes']) : null,
            'stars'      => array_key_exists('stars', $validatedData) ? $validatedData['stars'] : null,
            'number_of_nights' => $validatedData['number_of_nights'],
            'start_days'       => array_key_exists('start_days',$validatedData) ? implode(',',$validatedData['start_days']) : null
        ];

        if(array_key_exists('master_image',$validatedData)){
            $data['master_image'] = StoreFileService::SaveFile('cruises', $validatedData['master_image']);
        }

        return  $data;
    }

    private static function collectCruiseRoomData($roomData, $cruise)
    {
        return [
            'type'             => $roomData['type'],
            'max_num_adult'    => $roomData['max_num_adult'],
            'occupancy'        => $roomData['occupancy'],
            'max_num_children' => $roomData['max_num_children'],
            'inclusions'       => json_encode($roomData['inclusions']),
            'amenities'        => json_encode($roomData['amenities']),
            'categories'       => json_encode($roomData['categories']),
            'model_id'         => $cruise->id,
            'model_type'       => get_class($cruise)
        ];
    }

    private static function collectCruiseChildrenData($validatedData)
    {
        $first_child  = $validatedData['first_child'] ;
        $second_child  = $validatedData['second_child'] ;
        return [
            'hotel_id'=>$validatedData['cruise_id'],
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
    }

    private static function collectCruiseRoomSeasonData($roomData, $cruiseRoom)
    {
        if (array_key_exists('seasons', $roomData)) {
            foreach ($roomData['seasons'] as $season) {
                $seasonObject = PackageHotelSeason::find($season['id']);
                if ($seasonObject != null) {
                    $cruiseRoom->packageHotelRoomSeason()->updateOrCreate([
                        'package_hotel_season_id' => $season['id']
                    ], [
                        'package_hotel_season_id'       => $seasonObject->id,
                        'start_date'                    => $seasonObject->start_date,
                        'end_date'                      => $seasonObject->end_date,
                        'price_per_day'                 => $season['price_per_person'],
                        'package_hotel_room_id'         => $cruiseRoom->id,
                        'created_at'                    => now(),
                        'updated_at'                    => now()
                    ]);
                }
            }
        }
    }
}
