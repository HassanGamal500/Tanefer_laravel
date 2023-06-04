<?php
namespace App\GDSIntegration\Tbo\AvailableHotelRooms;

use App\Models\ProfitSetting;
use Carbon\Carbon;
use DateTime;

class DayRate
{

    /**
     * @var dateTime $date
     * @access public
     */
    public $date = null;

    /**
     * @var float $baseFare
     * @access public
     */
    public $baseFare = null;

    /**
     * @param dateTime $Date
     * @param float $BaseFare
     * @access public
     */
    public function __construct($Date, $BaseFare)
    {
      $this->date = Carbon::parse($Date)->format('Y-m-d');
      $this->baseFare = $this->addCommission($BaseFare);
    }

    public function addCommission($fare)
    {
        $fare = (float)$fare;

        $hotelProfit = ProfitSetting::where('target','hotel')->first();
        if(is_null($hotelProfit)){
            $fareWithCommission = $fare;
        }

        if($hotelProfit->type == 'percentage'){
            $profitValue = $hotelProfit->amount / 100;
            $fareWithCommission = ($fare * $profitValue) + $fare;
        }

        return round($fareWithCommission,2);
    }

}
