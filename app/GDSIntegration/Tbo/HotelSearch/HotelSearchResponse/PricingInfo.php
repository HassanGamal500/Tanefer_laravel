<?php
namespace App\GDSIntegration\Tbo\HotelSearch\HotelSearchResponse;

use App\Models\ProfitSetting;

class PricingInfo
{

    /**
     * @var string $PrefPrice
     * @access public
     */
    public $PrefPrice = null;

    /**
     * @var string $PrefCurrency
     * @access public
     */
    public $PrefCurrency = null;

    /**
     * @var float $TotalPrice
     * @access public
     */
    public $totalPrice = 0;

    /**
     * @var string $Currency
     * @access public
     */
    public $currency = '';


    /**
     * @var float $originalPrice
     * @access public
     */
    public $originalPrice = 0;

    /**
     * @param string $PrefPrice
     * @param string $PrefCurrency
     * @param float $TotalPrice
     * @param string $Currency
     * @param float $OriginalPrice
     * @access public
     */
    public function __construct($Currency, $OriginalPrice)
    {
      $this->totalPrice = $this->addCommission($OriginalPrice);
      $this->currency = $Currency;
      $this->originalPrice = (float)$OriginalPrice;
    }

    public function addCommission($originalPrice)
    {
        $originalPrice = (float)$originalPrice;
        $hotelProfit = ProfitSetting::where('target','hotel')->first();
        if(is_null($hotelProfit)){
            $totalPrice = $originalPrice;
        }

        if($hotelProfit->type == 'percentage'){
            $profitValue = $hotelProfit->amount / 100;
            $totalPrice = ($originalPrice * $profitValue) + $originalPrice;
        }else{
            $totalPrice = $originalPrice + $hotelProfit->amount;
        }

        return round($totalPrice,2);
    }

}
