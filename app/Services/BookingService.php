<?php


namespace App\Services;

use App\Models\BookingHistory;
use Illuminate\Support\Facades\Auth;

class BookingService
{
    public static function storeBookingHistory($booking, $type, $title){
        $user = Auth::user();
        return BookingHistory::create([
            'type'      => $type,
            'title'     => $title,
            'date'      => now(),
            'total'     => $booking->total_price,
            'status'    => $booking->status,
            'booking_id'=> $booking->id,
            'user_id'   => $user->id
        ]);
    }
}
