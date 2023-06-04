<?php


namespace App\Services\Packages;


use App\Models\PackageActivity;
use App\Services\StoreFileService;

class PackageActivityStoreService
{
    public static function storePackageActivityMainData($validatedData)
    {
        return PackageActivity::create(
            self::collectPackageActivityMainData($validatedData)
        );
    }

    public static function storePackageActivitySideActivityData($packageActivity, $validatedData)
    {
        $packageActivity->packageActivitySideActivity()
            ->create(self::collectPackageActivitySideActivityData($validatedData));

        return true;
    }

    /**
     *
     * */
    public static function storePackageActivityImage($packageActivity, $images)
    {
        if (is_array($images)) {
            foreach ($images as $image) {
                $imagePath = StoreFileService::SaveFile('package/activities', $image);
                $packageActivity->packageActivityImages()->create([
                    'image' => $imagePath,
                ]);
            }
        } else {
            $imagePath = StoreFileService::SaveFile('package/activities', $images);
            $packageActivity->update([
                'image' => $imagePath
            ]);
        }

        return true;

    }

    public static function storeStartDays($packageActivity,$startDays)
    {
        foreach ($startDays as $startDay){
            $packageActivity->startDays()->create(['day_of_week' => $startDay]);
        }
    }

    public static function storeSeasons($packageActivity,$seasons)
    {
        foreach ($seasons as $season){
            $packageActivity->seasons()->create([
                'from' => $season['from'],
                'to'   => $season['to']
            ]);
        }
    }


    public static function collectPackageActivityMainData($validatedData)
    {
        return [
            'title' => $validatedData['activity_title'],
            'overview' => $validatedData['activity_overview'],
            'includes' => json_encode($validatedData['activity_includes']),
            'excludes' => json_encode($validatedData['activity_excludes']),
            'price_per_person' => $validatedData['activity_price_per_person'],
            'duration_digits' => $validatedData['activity_duration_digits'],
            'duration_type' => $validatedData['activity_duration_type'],
            'activity_type' => $validatedData['activity_type'],
            'tour_city_id' => $validatedData['activity_city_id'],
            'pax_min_number' => $validatedData['activity_pax_min_number'] ?? 1,
            'start_time' => $validatedData['activity_start_time'] ?? null,
            'end_time' => $validatedData['activity_end_time'] ?? null,
            'is_published' => array_key_exists('is_published', $validatedData) ? (boolean)$validatedData['is_published'] : 0,
            'has_supplement' => array_key_exists('has_supplement',$validatedData) ? $validatedData['has_supplement'] : 0,
            'solo_price'     => array_key_exists('solo_price',$validatedData) ? $validatedData['solo_price'] : 0,
            'Limo_price'     => array_key_exists('Limo_price',$validatedData) ? $validatedData['Limo_price'] :0,
            'HiAC_price'     => array_key_exists('HiAC_price',$validatedData) ?$validatedData['HiAC_price'] : 0,
            'Caster_price'   => array_key_exists('Caster_price',$validatedData) ?$validatedData['Caster_price'] : 0,
            'bus_price'      => array_key_exists('bus_price',$validatedData) ? $validatedData['bus_price'] : 0,
            'start_days'                      => array_key_exists('start_days',$validatedData) ? strtolower(implode(',',$validatedData['start_days'])) : '',
            'single_supplement_percentage'    => array_key_exists('single_supplement_percentage',$validatedData) ?
                $validatedData['single_supplement_percentage'] ?? 0.0 : 0.0,
            'children_percentage'             => $validatedData['children_percentage'] ?? 0.0,

            'limo_children_percentage'        => $validatedData['limo_children_percentage'] ?? 0,
            'hiac_children_percentage'        => $validatedData['hiac_children_percentage'] ?? 0,
            'caster_children_percentage'        => $validatedData['caster_children_percentage'] ??  0,
            'bus_children_percentage'        => $validatedData['bus_children_percentage'] ?? 0,
        ];
//        if( array_key_exists('activity_image',$validatedData) )
//            $data['image']   =  StoreFileService::SaveFile('activity/banner', $validatedData['activity_image']);

    }

    private static function collectPackageActivitySideActivityData($validatedData)
    {
        return [
            'name' => $validatedData['name'],
            'time' => $validatedData['time'],
            'day_number' => $validatedData['day_number'],
        ];
    }
}
