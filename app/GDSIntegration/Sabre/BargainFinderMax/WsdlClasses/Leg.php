<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Leg
{

    /**
     * @var BaseFare $BaseFare
     */
    protected $BaseFare = null;

    /**
     * @var EquivFare $EquivFare
     */
    protected $EquivFare = null;

    /**
     * @var Taxes $Taxes
     */
    protected $Taxes = null;

    /**
     * @var TotalFare $TotalFare
     */
    protected $TotalFare = null;

    /**
     * @var TotalMileage $TotalMileage
     */
    protected $TotalMileage = null;

    /**
     * @var PointsRedemptionType $PointsRedemption
     */
    protected $PointsRedemption = null;

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @var string $FareStatus
     */
    protected $FareStatus = null;

    /**
     * @param BaseFare $BaseFare
     * @param EquivFare $EquivFare
     * @param Taxes $Taxes
     * @param TotalFare $TotalFare
     * @param TotalMileage $TotalMileage
     * @param PointsRedemptionType $PointsRedemption
     * @param int $Number
     * @param string $FareStatus
     */
    public function __construct($BaseFare = null, $EquivFare = null, $Taxes = null, $TotalFare = null, $TotalMileage = null, $PointsRedemption = null, $Number = null, $FareStatus = null)
    {
      $this->BaseFare = $BaseFare;
      $this->EquivFare = $EquivFare;
      $this->Taxes = $Taxes;
      $this->TotalFare = $TotalFare;
      $this->TotalMileage = $TotalMileage;
      $this->PointsRedemption = $PointsRedemption;
      $this->Number = $Number;
      $this->FareStatus = $FareStatus;
    }

    /**
     * @return BaseFare
     */
    public function getBaseFare()
    {
      return $this->BaseFare;
    }

    /**
     * @param BaseFare $BaseFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setBaseFare($BaseFare)
    {
      $this->BaseFare = $BaseFare;
      return $this;
    }

    /**
     * @return EquivFare
     */
    public function getEquivFare()
    {
      return $this->EquivFare;
    }

    /**
     * @param EquivFare $EquivFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setEquivFare($EquivFare)
    {
      $this->EquivFare = $EquivFare;
      return $this;
    }

    /**
     * @return Taxes
     */
    public function getTaxes()
    {
      return $this->Taxes;
    }

    /**
     * @param Taxes $Taxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setTaxes($Taxes)
    {
      $this->Taxes = $Taxes;
      return $this;
    }

    /**
     * @return TotalFare
     */
    public function getTotalFare()
    {
      return $this->TotalFare;
    }

    /**
     * @param TotalFare $TotalFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setTotalFare($TotalFare)
    {
      $this->TotalFare = $TotalFare;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setTotalMileage($TotalMileage)
    {
      $this->TotalMileage = $TotalMileage;
      return $this;
    }

    /**
     * @return PointsRedemptionType
     */
    public function getPointsRedemption()
    {
      return $this->PointsRedemption;
    }

    /**
     * @param PointsRedemptionType $PointsRedemption
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setPointsRedemption($PointsRedemption)
    {
      $this->PointsRedemption = $PointsRedemption;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param int $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

    /**
     * @return string
     */
    public function getFareStatus()
    {
      return $this->FareStatus;
    }

    /**
     * @param string $FareStatus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Leg
     */
    public function setFareStatus($FareStatus)
    {
      $this->FareStatus = $FareStatus;
      return $this;
    }

}
