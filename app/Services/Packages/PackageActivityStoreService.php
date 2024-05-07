<?php


namespace App\Services\Packages;


use App\Models\PackageActivity;
use App\Models\AvailabilitiesTour;
use App\Models\PricingTiersTour;
use App\Services\StoreFileService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Str;

class PackageActivityStoreService
{
    public static function storePackageActivityMainData($validatedData)
    {
        return PackageActivity::create(
            self::collectPackageActivityMainData($validatedData, null)
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
                    'max_child' => $pricingtier['max_child'],
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
                // if ($pricingtier['min'] <= $previousTiersMax) {
                //     dd($previousTiersMax);
                //     $message = 'Each pricing tier must be separate from the others';
                //     $data = ['errors' => $message, 'status' => 400];
                //     return $data;
                // } else {
                    $previousTiersMax = max($previousTiersMax, $pricingtier['max']);
                // }
            }
            if ($previousTiersMax > $previousMax) {
                $previousMax = $previousTiersMax;
            }
        }
    }
    public static function collectPackageActivityMainData($validatedData, $packageActivity)
    {
        return [
            'title' => $validatedData['activity_title'],
            'overview' => $validatedData['activity_overview'],
            'intro' => $validatedData['activity_intro'],
            'itinerary' => $validatedData['activity_itinerary'],
            'includes' => json_encode($validatedData['activity_includes']),
            'excludes' => json_encode($validatedData['activity_excludes']),
            'duration_digits' => $validatedData['activity_duration_digits'],
            'duration_type' => $validatedData['activity_duration_type'],
            'activity_type' => $validatedData['activity_type'],
            'tour_city_id' => $validatedData['activity_city_id'],
            'start_time' => $validatedData['activity_start_time'] ?? null,
            'end_time' => $validatedData['activity_end_time'] ?? null,
            'seo_title' => $validatedData['seo_title'] ?? null,
            'seo_description' => $validatedData['seo_description'] ?? null,
            'featured_image'            => array_key_exists('featured_image',$validatedData) ? StoreFileService::SaveFile('cities',$validatedData['featured_image'],$validatedData['activity_title']) : null,

            'slug' => isset($validatedData['slug']) && $validatedData['slug'] !== $packageActivity->slug ? $validatedData['slug'] : Str::slug($validatedData['activity_title']),

            'is_published' => array_key_exists('is_published', $validatedData) ? (boolean)$validatedData['is_published'] : 0,
            'start_days'                      => array_key_exists('start_days',$validatedData) ? strtolower(implode(',',$validatedData['start_days'])) : '',
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
