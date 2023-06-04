<?php

namespace App\Jobs;

use App\Models\HotelBookingGuest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveHotelGuests implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $requestData;
    private $hotelBookingId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requestData,$hotelBookingId)
    {
        $this->requestData = $requestData;
        $this->hotelBookingId = $hotelBookingId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->requestData['guests'] as $guest)
        {
            HotelBookingGuest::create([
                'isLead' => (bool)$guest['isLead'],
                'title' => $guest['title'],
                'first_name' => $guest['firstName'],
                'last_name'  => $guest['lastName'],
                'hotel_booking_id' => $this->hotelBookingId
            ]);
        }
    }
}
