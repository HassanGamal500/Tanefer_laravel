<?php

namespace App\Services\Packages;

use App\Models\Booking;
use App\Models\PackageActivity;

class ActivityBookingService
{
    public static function storeBookingMainData($request)
    {
        return Booking::create(
            self::collectBookingMainData($request)
        );
    }


    public static function storeBookingActivityData(Booking $booking,$bookingActivity)
    {
        $bookingCity = $booking->bookingCity()->create();
        return $bookingCity->bookingCityActivity()->create(
            self::collectBookingActivityData($bookingActivity)
        );
    }


    public static function storeBookingTravellerData($booking,$traveller)
    {
        return $booking->bookingTraveler()->create(self::collectBookingTravellerData($traveller));
    }

    public static function storeBookingData($booking,$request)
    {
        $booking->bookingData()->create(self::collectBookingData($request));
    }

    private static function collectBookingMainData($request)
    {
        $activityIds = array();
        foreach($request->activities as $activity) {
            $activityIds[] = $activity['activity_id'];
        }
        $impodeActivities = count($activityIds) > 0 ? implode(',' ,$activityIds ) : null;

        return [
            'trip_price_per_person'         => PackageActivity::find($request->activities[0]['activity_id'])->price_per_person,
            'total_price'                   => $request->total_price,
            'adults'                        => $request->adults,
            'children'                      => $request->children,
            'status'                        => 'pending payment',
            'model_id'                      => $request->activities[0]['activity_id'],
            'model_type'                    => get_class(new PackageActivity()),
            'model_ids'                     => $impodeActivities
        ];
    }

    private static function collectBookingActivityData($bookingActivity)
    {
        $getPricePerPerson = PackageActivity::find($bookingActivity['activity_id'])->price_per_person;
        return [
            'package_activity_id'       => $bookingActivity['activity_id'],
            'date'                      => $bookingActivity['date'],
            'day_number'                => 0,
            'price_per_person'          => $getPricePerPerson != null ? $getPricePerPerson : 0,
        ];
    }

    private static function collectBookingTravellerData($traveller)
    {
        return [
            'passengerTitle'            => $traveller['passengerTitle'] ?? null,
            'passengerFirstName'        => $traveller['passengerFirstName'] ?? null,
            'passengerLastName'         => $traveller['passengerLastName'] ?? null,
        ];
    }

    private static function collectBookingData($request)
    {
        return [
            'contact_phone'             => $request->contact_phone ?? null,
            'contact_email'             => $request->contact_email ?? null,
        ];
    }
}
