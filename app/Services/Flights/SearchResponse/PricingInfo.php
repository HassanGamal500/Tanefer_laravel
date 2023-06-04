<?php


namespace App\Services\Flights\SearchResponse;


use App\Models\FlightsPromotion;
use App\Models\ProfitSetting;
use Illuminate\Support\Collection;

class PricingInfo
{
    /**
     * @var float $baseFare
     * */
    public $baseFare;

    /**
     * @var float $taxes
     * */
    public $taxes;

    /**
     * @var float $TotalFare
     * */
    public $TotalFare;

    /**
     * @var float $discount_amount
     * */
    public $discount_amount;

    /**
     * @var float $newFare
     * */
    public $newFare;

    /**
     * @var string $TotalFare_CurrencyCode
     * */
    public $TotalFare_CurrencyCode;

    /**
     * @var string $fare_type
     * */
    public $fare_type;

    /**
     * @var string $totalFareNote
     * */
    public $totalFareNote;

    /**
     * @var float $originalFare
     * */
    public $originalFare;


    public function __construct(float $baseFare = 0,
                                float $taxes = 0,float $TotalFare = 0,
                                float $discount_amount = 0,float $newFare = 0,
                                string $TotalFare_CurrencyCode = '',
                                string $fare_type = '',
                                string $totalFareNote = '')
    {
        $this->baseFare = $baseFare;
        $this->taxes = $taxes;
        $this->TotalFare = $TotalFare;
        $this->discount_amount = $discount_amount;
        $this->newFare = $newFare;
        $this->TotalFare_CurrencyCode = $TotalFare_CurrencyCode;
        $this->fare_type = $fare_type;
        $this->totalFareNote = $totalFareNote;
    }

    public function setFareType($fareType)
    {
        $this->fare_type = $fareType;
        return $this;
    }

    public function setBaseFare(float $originalBaseFare,bool $isDomesticFlight,Collection $profitSettings)
    {
        if($this->fare_type == 'Net') {
         $finalProfitSettings = $this->profitSettingsOfNetFlights($profitSettings,$isDomesticFlight);
        }else{
            $finalProfitSettings = $this->profitSettingsOfPublishFlights($profitSettings,$isDomesticFlight);
        }

        if(is_null($finalProfitSettings)){
            $finalProfitSettings = $this->profitSettingsOfAllFlights($profitSettings,$isDomesticFlight);
            if(is_null($finalProfitSettings)){
                $baseFare = $originalBaseFare;
            }else{
                $baseFare = $this->calculateBaseFareFromProfitSettings($finalProfitSettings,$originalBaseFare);
            }
        }else{
            $baseFare = $this->calculateBaseFareFromProfitSettings($finalProfitSettings,$originalBaseFare);
        }

        $this->baseFare = round($baseFare,2);
        return $this;
    }

    public function setOriginalFare(float $originalFare)
    {
        $this->originalFare = round($originalFare,2);
        return $this;
    }

    public function setTaxes(float $taxes)
    {
        $this->taxes = round($taxes,2);
        return $this;
    }

    public function setTotalFare()
    {
        $this->TotalFare = round($this->baseFare + $this->taxes,2);
        return $this;
    }

    public function setDiscountAmount(FlightsPromotion $promotion = null)
    {
        if(is_null($promotion)){
            $this->discount_amount = 0;
        }else{
            $this->discount_amount = $promotion->discount_amount;
        }
        return $this;
    }

    public function setNewFare(FlightsPromotion $promotion = null)
    {
        if(is_null($promotion)){
            $this->newFare = 0;
        }else{
            $this->newFare = round($this->TotalFare - $this->discount_amount,2);
        }
        return $this;
    }

    public function setTotalFareCurrency(string $currency)
    {
        $this->TotalFare_CurrencyCode = $currency;
        return $this;
    }

    public function setTotalFareNote()
    {
        $this->totalFareNote = 'price per person(Adult) (incl. taxes & fees)';
        return $this;
    }

    private function profitSettingsOfNetFlights(Collection $profitSettings,bool $isDomesticFlight)
    {
        $profitSettingsNet = $profitSettings->filter(function ($item) {
            return false !== stristr($item->target, 'net');
        });

        if (count($profitSettingsNet) > 0) {
            foreach ($profitSettingsNet as $profitSetting) {
                switch ($profitSetting->target) {
                    case 'net-domestic-flights':
                        $finalProfitSettings = $isDomesticFlight ? $profitSetting : null;
                        break;
                    case 'net-international-flights':
                        $finalProfitSettings = $isDomesticFlight ? null : $profitSetting;
                        break;
                    case 'net-flights':
                        $finalProfitSettings = $profitSetting;
                        break;
                }// end condition for check types of net fares flights
            }// end loop for profit settings for net flights
        }// end condition if profit settings include net fares flights settings

        return $finalProfitSettings ?? null;
    }

    private function profitSettingsOfPublishFlights(Collection $profitSettings,bool $isDomesticFlight)
    {
        $profitSettingsPublish =  $profitSettings->filter(function($item){
            return false !== stristr($item->target,'publish');
        });

        if(count($profitSettingsPublish) > 0){
            foreach ($profitSettingsPublish as $profitSetting) {
                switch ($profitSetting->target) {
                    case 'publish-domestic-flights':
                        $finalProfitSettings = $isDomesticFlight ? $profitSetting : null;
                        break;
                    case 'publish-international-flights':
                        $finalProfitSettings = $isDomesticFlight ? null : $profitSetting;
                        break;
                    case 'publish-flights':
                        $finalProfitSettings = $profitSetting;
                        break;
                }// end condition for check types of publish fares flights
            }
        }

        return $finalProfitSettings ?? null;
    }

    private function profitSettingsOfAllFlights(Collection $profitSettings,bool $isDomesticFlight)
    {
        $profitSettingsAll = $profitSettings->filter(function($item){
            return false !== stristr($item->target,'all');
        });

        foreach ($profitSettingsAll as $profitSetting){
            switch ($profitSetting->target) {
                case 'all-domestic-flights':
                    $finalProfitSettings = $isDomesticFlight ? $profitSetting : null;
                    break;
                case 'all-international-flights':
                    $finalProfitSettings = $isDomesticFlight ? null : $profitSetting;
                    break;
            }// end condition for check all types of fares flights
        }


        return $finalProfitSettings ?? null;
    }

    private function calculateBaseFareFromProfitSettings(ProfitSetting $finalProfitSettings,float $originalBaseFare)
    {
        $profitAmount = $finalProfitSettings->amount;
        $profitType   = $finalProfitSettings->type;
        $minAmount = $finalProfitSettings->min_profit_amount;

        if($profitType == 'percentage'){
            $percentage = $profitAmount / 100;
            $commissionValue = ($originalBaseFare * $percentage);
            if($commissionValue <= $minAmount){
                $baseFare = $originalBaseFare + $minAmount;
            }else{
                $baseFare = $originalBaseFare + $commissionValue;
            }
        }else{
            $baseFare = $profitAmount + $originalBaseFare;
        }

        return $baseFare;
    }
}
