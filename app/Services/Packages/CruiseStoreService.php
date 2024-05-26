<?php

namespace App\Services\Packages;

use App\Models\Cruise;
use App\Models\CruiseImage;
use App\Models\PackageHotelChildren;
use App\Models\PackageHotelRoom;
use App\Models\PackageHotelSeason;
use App\Models\CruiseChildrenPackage;
use App\Services\StoreFileService;
use Illuminate\Support\Str;

class CruiseStoreService
{
    public static function storeCruiseData($validateData, $cruise)
    {
        return Cruise::create(
            self::collectCruiseData($validateData,$cruise)
        );
    }

    public static function StoreCruiseRooms($rooms, $cruise)
    {
        $cruiseIds = [];
        foreach ($rooms as $room) {
            $cruiseRoom = PackageHotelRoom::create(
                self::collectCruiseRoomData($room, $cruise)
            );
            $cruiseIds[] = $cruiseRoom->id;
            self::collectCruiseRoomSeasonData($room, $cruiseRoom);

        }
        return $cruiseIds;

    }

    public static function storeCruiseImages($images, $cruise)
    {
        foreach ($images as $image) {
            $imagePath = StoreFileService::SaveFile('cruises', $image['image']);
            $cruise->images()->create([
                'image' => $imagePath,
                'sort' => $image['sort']
            ]);
        }
    }
    
    public static function storeCruiseMasterimage($image, $cruise)
    {
        $imagePath = StoreFileService::SaveFile('cruises', $image);
        $cruise->update([
            'master_image' => $imagePath,
        ]);
    }
    
    public static function createOrUpdateCruiseImages($images, $cruise)
    {
        $deleteImagesArray = array();
        $getImageIds = $cruise->images()->pluck('id')->toArray();

        foreach ($getImageIds as $id) {
            if(!in_array($id, $images['id'])) {
                $deleteImagesArray[] = $id;
            }
        }

        foreach ($images['sort'] as $index => $sort) {
            if ($images['id'][$index] != null && $images['id'][$index] != 'null') {
                if ($images['file'][$index] != null && $images['file'][$index] != 'null') {
                    $imagePath = StoreFileService::SaveFile('cruises', $images['file'][$index]);
                    CruiseImage::where('id', $images['id'][$index])->update([
                        'image' => $imagePath, 
                        'sort'  => $sort
                    ]);
                } else {
                    CruiseImage::where('id', $images['id'][$index])->update(['sort' => $sort]);
                }
            } else {
                if ($images['file'][$index] != null && $images['file'][$index] != 'null') {
                    $imagePath = StoreFileService::SaveFile('cruises', $images['file'][$index]);
                    $cruise->images()->create([
                        'image' => $imagePath,
                        'sort'  => $sort
                    ]);
                }
            }
        }
        
        if (count($deleteImagesArray) > 0) {
            //Delete Image
            CruiseImage::whereIn('id', $deleteImagesArray)->delete();
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

        return $cruiseRoom->id;
    }

    public static function collectCruiseData($validatedData, $cruise) : array
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
            'seo_title' => $validatedData['seo_title'],
            'seo_description' => $validatedData['seo_description'],
            'slug' => isset($validatedData['slug']) && $validatedData['slug'] !== $cruise->slug ? $validatedData['slug'] : Str::slug($validatedData['name']) . '_' . rand(1,100),
            'start_days'       => array_key_exists('start_days',$validatedData) ? implode(',',$validatedData['start_days']) : null,
            'sort'  => $validatedData['sort'],
        ];

        if(array_key_exists('master_image',$validatedData)){
            $data['master_image'] = StoreFileService::SaveFile('cruises', $validatedData['master_image']);
        }
        if(array_key_exists('featured_image',$validatedData)){
            $data['featured_image'] = StoreFileService::SaveFile('cruises', $validatedData['featured_image']);
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
    public function storeChildrenData($roomData, $cruise_id, $cruiseRoom)
{
    $availabilityIndex = 0;
    foreach ($roomData as $room) {
        if ($room['childrens']) {
            if (is_array($cruiseRoom) && isset($cruiseRoom)) {
                $cruiseRoomdata = $cruiseRoom[$availabilityIndex];
                foreach ($room['childrens'] as $children) {
                    CruiseChildrenPackage::create([
                        "min" => $children['min'],
                        "max" => $children['max'],
                        "children_Percentage" => $children['children_Percentage'],
                        "cruise_id" => $cruise_id,
                        'package_hotel_room_id' => $cruiseRoomdata,
                    ]);
                }
                $availabilityIndex++;
            }
        }
    }
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
