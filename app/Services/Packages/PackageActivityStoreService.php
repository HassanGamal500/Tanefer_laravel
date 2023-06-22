<?php


namespace App\Services\Packages;


use App\Models\PackageActivity;
use App\Models\AvailabilitiesTour;
use App\Models\PricingTiersTour;
use App\Services\StoreFileService;
use Carbon\Carbon;
use DateTime;

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

    public static function storeAvailabilityTime($availabilities,$tour_id,$validatedData)
    {
        $availabilityIds = [];
        foreach ($availabilities as $aval) {
            if (is_array($aval)) {
                $availability = AvailabilitiesTour::create([
                    'from_date' => $aval['from_date'],
                    'to_date'   => $aval['to_date'],
                    'package_activity_id'   => $tour_id,
                ]);
                $availabilityIds[] = $availability->id;
            }
        }
        return $availabilityIds;
    }

    public static function errorAvailabilityTime($availabilities,$validatedData)
    {
        foreach ($availabilities as $aval) {
            $carbonDate = Carbon::createFromFormat('Y-m-d', $aval['from_date']); // create a Carbon instance from the date
            $dayName = $carbonDate->format('l');
            if (!in_array(strtolower($dayName), $validatedData['start_days'])) {
                $message = 'No Availabilities Tours found';
                $data = ['errors' => $message, 'status' => 400];
                return $data;
            }
        }
    }



    public static function storePricingTiersTour($availabilities, $availabilityIds, $tour_id) {

        $availabilityIndex = 0;
        foreach ($availabilities as $availability) {
            foreach ($availability['pricingtiers'] as $pricingtier) {
                $availability_id = $availabilityIds[$availabilityIndex];
                PricingTiersTour::create([
                    'name' => $pricingtier['name'],
                    'min' => $pricingtier['min'],
                    'max' => $pricingtier['max'],
                    'adult_price' => $pricingtier['adult_price'],
                    'child_percentage' => $pricingtier['child_percentage'],
                    'availabilities_tour_id' => $availability_id,
                    'package_activity_id' => $tour_id,
                ]);
            }
            $availabilityIndex++;
        }
    }

    public static function validateFromAfterTo($availabilities) {
        usort($availabilities, function($a, $b) {
            return strcmp($a["from_date"], $b["from_date"]);
        });
        for ($i = 0; $i < count($availabilities) - 1; $i++) {
            $current_to_date = new DateTime($availabilities[$i]["to_date"]);
            $next_from_date = new DateTime($availabilities[$i + 1]["from_date"]);

            if ($current_to_date >= $next_from_date) {
                return false;
            }
        }

        return true;
    }

    public static function valudatedateaval($availabilities) {
        if (!self::validateFromAfterTo($availabilities)) {
            $message = 'Please choose the start date after the end date';
            $data = ['errors' => $message, 'status' => 400];
            return $data;
        }
    }

    public static function storePricingTiersTourValid($availabilities)
    {
        $previousMax = -1;
        foreach ($availabilities as $availability) {
            $previousTiersMax = -1;
            foreach ($availability['pricingtiers'] as $pricingtier) {
                if ($pricingtier['min'] <= $previousTiersMax) {
                    $message = 'Each pricing tier must be separate from the others';
                    $data = ['errors' => $message, 'status' => 400];
                    return $data;
                } else {
                    $previousTiersMax = max($previousTiersMax, $pricingtier['max']);
                }
            }
            if ($previousTiersMax > $previousMax) {
                $previousMax = $previousTiersMax;
            }
        }
    }
    public static function collectPackageActivityMainData($validatedData)
    {
        return [
            'title' => $validatedData['activity_title'],
            'overview' => $validatedData['activity_overview'],
            'intro' => $validatedData['activity_intro'],
            'itinerary' => $validatedData['activity_itinerary'],
            'includes' => json_encode($validatedData['activity_includes']),
            'excludes' => json_encode($validatedData['activity_excludes']),
            // 'price_per_person' => $validatedData['activity_price_per_person'],
            'duration_digits' => $validatedData['activity_duration_digits'],
            // 'duration_type' => $validatedData['activity_duration_type'],
            'activity_type' => $validatedData['activity_type'],
            'tour_city_id' => $validatedData['activity_city_id'],
            // 'pax_min_number' => $validatedData['activity_pax_min_number'] ?? 1,
            'start_time' => $validatedData['activity_start_time'] ?? null,
            'end_time' => $validatedData['activity_end_time'] ?? null,
            'is_published' => array_key_exists('is_published', $validatedData) ? (boolean)$validatedData['is_published'] : 0,
            // 'has_supplement' => array_key_exists('has_supplement',$validatedData) ? $validatedData['has_supplement'] : 0,
            // 'solo_price'     => array_key_exists('solo_price',$validatedData) ? $validatedData['solo_price'] : 0,
            // 'Limo_price'     => array_key_exists('Limo_price',$validatedData) ? $validatedData['Limo_price'] :0,
            // 'HiAC_price'     => array_key_exists('HiAC_price',$validatedData) ?$validatedData['HiAC_price'] : 0,
            // 'Caster_price'   => array_key_exists('Caster_price',$validatedData) ?$validatedData['Caster_price'] : 0,
            // 'bus_price'      => array_key_exists('bus_price',$validatedData) ? $validatedData['bus_price'] : 0,
            'start_days'                      => array_key_exists('start_days',$validatedData) ? strtolower(implode(',',$validatedData['start_days'])) : '',
            // 'single_supplement_percentage'    => array_key_exists('single_supplement_percentage',$validatedData) ?
            //     $validatedData['single_supplement_percentage'] ?? 0.0 : 0.0,
            // 'children_percentage'             => $validatedData['children_percentage'] ?? 0.0,

            // 'limo_children_percentage'        => $validatedData['limo_children_percentage'] ?? 0,
            // 'hiac_children_percentage'        => $validatedData['hiac_children_percentage'] ?? 0,
            // 'caster_children_percentage'        => $validatedData['caster_children_percentage'] ??  0,
            // 'bus_children_percentage'        => $validatedData['bus_children_percentage'] ?? 0,
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
