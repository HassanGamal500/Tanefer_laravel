<?php


namespace App\Services;

use App\Models\BookingHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public static function storeBookingHistory($booking){
        $user = Auth::guard('passport')->user();
        if ($user) {
            switch ($booking->model_type) {
                case 'App\Models\Package':
                    $type = 'package';
                    $modelDetails = DB::table('packages')->select('id', 'title', 'duration')->where('id', $booking->model_id)->first();
                    $title = $modelDetails->title;
                    $duration = $modelDetails->duration . ' days';
                    break;
                case 'App\Models\Cruise':
                    $type = 'cruise';
                    $modelDetails = DB::table('cruises')->select('id', 'name', 'number_of_nights')->where('id', $booking->model_id)->first();
                    $title = $modelDetails->name;
                    $duration = $modelDetails->number_of_nights . ' nights';
                    break;
                case 'App\Models\GtaHotelPortfolio':
                    $type = 'hotel';
                    $modelDetails = DB::table('gta_hotel_portfolios')->select('id', 'name')->where('id', $booking->model_id)->first();
                    $title = $modelDetails->name;
                    $duration = '0 days';
                    break;
                default:
                    $type = 'adventure';
                    $modelDetails = DB::table('package_activities')->select('id', 'title', 'duration_digits', 'duration_type')->where('id', $booking->model_id)->first();
                    $title = $modelDetails->title;
                    $duration = $modelDetails->duration_digits . ' ' . $modelDetails->duration_type;
                    break;
            }
            
            return BookingHistory::create([
                'type'      => $type, //'adventure', 'cruise', 'package', 'hotel'
                'title'     => $title,
                'date'      => now(),
                'duration'  => $duration,
                'total'     => $booking->total_price,
                'status'    => $booking->status,
                'booking_id'=> $booking->id,
                'user_id'   => $user->id
            ]);
        }
    }
}
