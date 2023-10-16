<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PackageActivityDetails;
use App\Http\Resources\Admin\PackageResource;
use App\Models\Booking;
use App\Models\Package;

class BookingController extends Controller
{
    public function packageBookings()
    {
        $bookings = Booking::with('package')->where('package_id','!=',null)->latest()->get();

        return response()->json($bookings);
    }

    public function bookingDetails($id)
    {
        $booking = Booking::with([
            'bookingCity', 'bookingPayment', 'bookingTraveler', 'bookingData',
            'startCity', 'endCity'
            // 'bookingCity', 'bookingPayment', 'bookingTraveler', 'bookingData',
            // 'startCity', 'endCity', 'package'
        ])
            ->where('id', $id)
            ->first();

            $trip = Package::where('id',$booking->package_id)->first();

        if (is_null($booking)) {
            return response()->json(['message' => 'This booking was not found'], 404);
        }


        $booking->package = new PackageActivityDetails( $trip );

        // $adventure = $booking->adventure();
        // if($adventure != null && $adventure != 'null' && !empty($adventure)) {
        //     $booking->package->adventure = $adventure;
        // }
        return response()->json(['bookingDetails' => $booking]);
    }



    public function activityBookings()
    {
        $bookings = Booking::where('package_id',null)->latest()->get();

        return response()->json($bookings);
    }
}
