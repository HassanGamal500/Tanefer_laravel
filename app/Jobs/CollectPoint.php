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
use \App\Models\CollectPoint as Collect;

class CollectPoint implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    //Job Properties
    protected $booking_reference;
    protected $booking_type;
    protected $total_paid_amount;
    protected $number_of_travellers;
    protected $authUser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($booking_reference,$booking_type,$total_paid_amount,$authUser,$number_of_travellers = 0)
    {
        $this->booking_reference = $booking_reference;
        $this->booking_type  = $booking_type;
        $this->total_paid_amount = $total_paid_amount;
        $this->number_of_travellers = $number_of_travellers;
        $this->authUser = $authUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pointsFromTravellersNumber = $this->pointsFromTravellersNumber($this->number_of_travellers);
        $pointsFromTotalPaid        = floor($this->total_paid_amount);
        $booking_type_model         = $this->bookingType($this->booking_reference);


        Collect::create([
            'user_id' => $this->authUser['id'],
            'points'  => $pointsFromTotalPaid,
            'reason'  => 'Points from total paid amount from book a '.$this->booking_type,
            'model_type' => $booking_type_model['model_type'],
            'model_id'   => $booking_type_model['model_id']
        ]);

        if($this->number_of_travellers > 1 && $this->booking_type != 'car'){
            Collect::create([
                'user_id' => $this->authUser['id'],
                'points'  => $pointsFromTravellersNumber,
                'reason'  => 'Points from number of travellers from book a '.$this->booking_type,
                'model_type' => $booking_type_model['model_type'],
                'model_id'   => $booking_type_model['model_id']
            ]);
        }
        $user = User::find($this->authUser['id']);
        $userAvailablePoints = $this->authUser['available_points'];
        $user->available_points = $userAvailablePoints + $pointsFromTravellersNumber + $pointsFromTotalPaid;
        $user->update();

    }

    public function pointsFromTravellersNumber($travellers)
    {
        $baseValue = LoyaltyProgramSetting::where('type','travelers-number')->first()->number;

        $travellers_number = pow($baseValue,$travellers);

        return $travellers_number;
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
