<?php

namespace App\Jobs;

use App\Models\HotelBooking;
use App\Models\LoyaltyProgramSetting;
use App\Models\Pnr;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RedeemPoint implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $booking_reference;
    protected $total_paid_amount;
    protected $authUser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($booking_reference,$total_paid_amount,$authUser)
    {
        $this->booking_reference = $booking_reference;
        $this->total_paid_amount = $total_paid_amount;
        $this->authUser          = $authUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $authUser = auth()->guard('api')->user();
        $booking_type_model         = $this->bookingType($this->booking_reference);
        $pointsPerUnitPrice         = $this->pointsPerUnitPrice();
        $redeemedPoints             = $this->redeemedPoints($this->total_paid_amount,$pointsPerUnitPrice);

        \App\Models\RedeemPoint::create([
            'user_id'   => $this->authUser['id'],
            'points'    => $redeemedPoints,
            'points_per_unit_price' => $pointsPerUnitPrice,
            'price_amount'          => $this->total_paid_amount,
            'currency'              => 'USD',
            'model_type' => $booking_type_model['model_type'],
            'model_id'   => $booking_type_model['model_id']

        ]);

        $userAvailablePoints = $this->authUser['available_points'];

        $user = User::find($this->authUser['id']);
        $user->available_points = $userAvailablePoints - $redeemedPoints;
        $user->update();
    }

    public function redeemedPoints($totalAmount,$pointsUnitPrice)
    {
        $points = $totalAmount * $pointsUnitPrice;

        return $points;
    }

    public function pointsPerUnitPrice()
    {
        $points = LoyaltyProgramSetting::where('type','redeem-points-per-price')->first();
        if(is_null($points))
            return 0;

        return $points->number;
    }


    public function bookingType($booking_number)
    {
        $pnr = Pnr::where('pnr_id',$booking_number)->first();
        if($pnr != null){
            return [
                'model_type' => get_class($pnr),
                'model_id'   => $pnr->id
            ];
        }else{
            $hotelBook = HotelBooking::where('booking_number',$booking_number)->first();

            return [
                'model_type' => get_class($hotelBook),
                'model_id'   => $hotelBook->id
            ];
        }
    }

}
