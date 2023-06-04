<?php

namespace App\Jobs;

use App\Models\HotelBookingRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveHotelRooms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $hotelRooms;
    private $hotelBookingId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hotelRooms,$hotelBookingId)
    {
        $this->hotelRooms = $hotelRooms;
        $this->hotelBookingId = $hotelBookingId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->hotelRooms as $room)
        {
            HotelBookingRoom::create([
                'room_type' => $room->roomName,
                'room_code' => $room->roomCode,
                'base_fare' => $room->rateSummary->baseFare,
                'tax'       => $room->rateSummary->tax,
                'total_fare'=> $room->rateSummary->totalFare,
                'currency'  => $room->rateSummary->currency,
                'hotel_booking_id' => $this->hotelBookingId
            ]);
        }
    }
}
