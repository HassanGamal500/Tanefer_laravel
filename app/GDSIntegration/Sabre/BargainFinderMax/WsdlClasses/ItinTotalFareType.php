<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ItinTotalFareType extends FareType
{

    /**
     * @var Extras $Extras
     */
    protected $Extras = null;

    /**
     * @var TotalWithExtras $TotalWithExtras
     */
    protected $TotalWithExtras = null;

    /**
     * @var TotalMileage $TotalMileage
     */
    protected $TotalMileage = null;

    /**
     * @var ServiceFee $ServiceFee
     */
    protected $ServiceFee = null;

    /**
     * @var BaseFare $BaseFare
     * */
    protected $BaseFare = null;

    /**
     * @var CurrencyAmountType $FareConstruction
     * */
    protected $FareConstruction;

    /**
     * @var EquivFare $EquivFare
     * */
    protected $EquivFare;

    /**
     * @var Taxes $Taxes
     * */
    protected $Taxes;

    /**
     * @var TotalFare $TotalFare
     * */
    protected $TotalFare;

    /**
     * @param Money $Amount
     * @param CurrencyCodeType $CurrencyCode
     * @param int $DecimalPlaces
     * @param FareTypeNameType $Code
     */
    public function __construct($Amount = null, $CurrencyCode = null, $DecimalPlaces = null, $Code = null)
    {
      parent::__construct($Amount, $CurrencyCode, $DecimalPlaces, $Code);
    }


    public function getBaseFare()
    {
        return $this->BaseFare;
    }

    public function getEquivFare()
    {
        return $this->EquivFare;
    }

    public function getTaxes()
    {
        return $this->Taxes;
    }

    public function getTotalFare()
    {
        return $this->TotalFare;
    }

    public function getFareConstruction()
    {
        return $this->FareConstruction;
    }

    /**
     * @return Extras
     */
    public function getExtras()
    {
      return $this->Extras;
    }

    /**
     * @param Extras $Extras
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ItinTotalFareType
     */
    public function setExtras($Extras)
    {
      $this->Extras = $Extras;
      return $this;
    }

    /**
     * @return TotalWithExtras
     */
    public function getTotalWithExtras()
    {
      return $this->TotalWithExtras;
    }

    /**
     * @param TotalWithExtras $TotalWithExtras
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ItinTotalFareType
     */
    public function setTotalWithExtras($TotalWithExtras)
    {
      $this->TotalWithExtras = $TotalWithExtras;
      return $this;
    }

    /**
     * @return TotalMileage
     */
    public function getTotalMileage()
    {
      return $this->TotalMileage;
    }

    /**
     * @param TotalMileage $TotalMileage
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ItinTotalFareType
     */
    public function setTotalMileage($TotalMileage)
    {
      $this->TotalMileage = $TotalMileage;
      return $this;
    }

    /**
     * @return ServiceFee
     */
    public function getServiceFee()
    {
      return $this->ServiceFee;
    }

    /**
     * @param ServiceFee $ServiceFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ItinTotalFareType
     */
    public function setServiceFee($ServiceFee)
    {
      $this->ServiceFee = $ServiceFee;
      return $this;
    }

}
