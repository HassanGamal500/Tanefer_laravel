<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareType extends CurrencyAmountType
{

    /**
     * @var FareTypeNameType $Code
     */
    protected $Code = null;

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
      parent::__construct($Amount, $CurrencyCode, $DecimalPlaces);
      $this->Code = $Code;
    }

    /**
     * @return FareTypeNameType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param FareTypeNameType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
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

}
