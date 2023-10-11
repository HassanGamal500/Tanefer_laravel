<?php

namespace App\Http\Controllers\ApiV2\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

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
            'startCity', 'endCity', 'package'
        ])
            ->where('id', $id)
            ->first();

        if (is_null($booking)) {
            return response()->json(['message' => 'This booking was not found'], 404);
        }

        $adventure = $booking->adventure();
        if($adventure != null && $adventure != 'null' && !empty($adventure)) {
            $booking->package->adventure = $adventure;
        }
        return response()->json(['bookingDetails' => $booking]);
    }



    public function activityBookings()
    {
        $bookings = Booking::where('package_id',null)->latest()->get();

        return response()->json($bookings);
    }
}
