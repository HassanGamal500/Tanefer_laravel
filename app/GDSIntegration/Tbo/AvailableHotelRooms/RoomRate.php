<?php
namespace App\GDSIntegration\Tbo\AvailableHotelRooms;

use App\Models\ProfitSetting;

class RoomRate
{

    /**
     * @var float $ExtraGuestCharges
     * @access public
     */
    public $ExtraGuestCharges = null;

    /**
     * @var float $ChildCharges
     * @access public
     */
    public $ChildCharges = null;

    /**
     * @var float $Discount
     * @access public
     */
    public $Discount = null;

    /**
     * @var float $OtherCharges
     * @access public
     */
    public $OtherCharges = null;

    /**
     * @var float $ServiceTax
     * @access public
     */
    public $ServiceTax = null;

    /**
     * @var boolean $IsPackageRate
     * @access public
     */
    public $IsPackageRate = null;

    /**
     * @var boolean $IsInstantConfirmed
     * @access public
     */
    public $IsInstantConfirmed = null;

    /**
     * @var string $HeadGSAMarkUp
     * @access public
     */
    public $HeadGSAMarkUp = null;

    /**
     * @var float $AgentMarkUp
     * @access public
     */
    public $AgentMarkUp = null;

    /**
     * @var string $currency
     * @access public
     */
    public $currency = null;

    /**
     * @var float $baseFare
     * @access public
     */
    public $baseFare = null;

    /**
     * @var float $originalBaseFare
     * @access public
     */
    public $originalBaseFare = null;

    /**
     * @var float $tax
     * @access public
     */
    public $tax = null;

    /**
     * @var float $totalFare
     * @access public
     */
    public $totalFare = null;

    /**
     * @var float $originalTotalRate
     * @access public
     */
    public $originalTotalRate;

    /**
     * @param float $ExtraGuestCharges
     * @param float $ChildCharges
     * @param float $Discount
     * @param float $OtherCharges
     * @param float $ServiceTax
     * @param boolean $IsPackageRate
     * @param boolean $IsInstantConfirmed
     * @param string $HeadGSAMarkUp
     * @param float $AgentMarkUp
     * @param string $Currency
     * @param float $RoomFare
     * @param float $RoomTax
     * @param float $TotalFare
     * @param float $originalTotalRate
     * @access public
     */
    public function __construct($ExtraGuestCharges,
                                $ChildCharges, $Discount,
                                $OtherCharges, $ServiceTax,
                                $IsPackageRate, $IsInstantConfirmed,
                                $AgentMarkUp, $Currency,
                                $RoomFare, $RoomTax, $TotalFare)
    {
      $this->ExtraGuestCharges = $ExtraGuestCharges;
      $this->ChildCharges = $ChildCharges;
      $this->Discount = $Discount;
      $this->OtherCharges = $OtherCharges;
      $this->ServiceTax = $ServiceTax;
      $this->IsPackageRate = $IsPackageRate;
      $this->IsInstantConfirmed = $IsInstantConfirmed;
      $this->AgentMarkUp = $AgentMarkUp;
      $this->currency = $Currency;
      $this->baseFare = $this->addCommission($RoomFare);
      $this->originalBaseFare = $RoomFare;
      $this->tax = (float)$RoomTax;
      $this->totalFare = $this->addCommission($TotalFare);
      $this->originalTotalRate = (float)$TotalFare;
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
        }else{
            $fareWithCommission = $fare + $hotelProfit->amount;
        }

        return round($fareWithCommission,2);
    }

}
