<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PointsRedemptionType
{

    /**
     * @var int $TotalPoints
     */
    protected $TotalPoints = null;

    /**
     * @var int $BaseFarePoints
     */
    protected $BaseFarePoints = null;

    /**
     * @var float $BaseFareConversionRate
     */
    protected $BaseFareConversionRate = null;

    /**
     * @var int $TotalSurcharges
     */
    protected $TotalSurcharges = null;

    /**
     * @var float $SurchargesConversionRate
     */
    protected $SurchargesConversionRate = null;

    /**
     * @var int $TotalTaxes
     */
    protected $TotalTaxes = null;

    /**
     * @var float $TaxConversionRate
     */
    protected $TaxConversionRate = null;

    /**
     * @var int $MinimumPoints
     */
    protected $MinimumPoints = null;

    /**
     * @param int $TotalPoints
     * @param int $BaseFarePoints
     * @param float $BaseFareConversionRate
     * @param int $TotalSurcharges
     * @param float $SurchargesConversionRate
     * @param int $TotalTaxes
     * @param float $TaxConversionRate
     * @param int $MinimumPoints
     */
    public function __construct($TotalPoints = null, $BaseFarePoints = null, $BaseFareConversionRate = null, $TotalSurcharges = null, $SurchargesConversionRate = null, $TotalTaxes = null, $TaxConversionRate = null, $MinimumPoints = null)
    {
      $this->TotalPoints = $TotalPoints;
      $this->BaseFarePoints = $BaseFarePoints;
      $this->BaseFareConversionRate = $BaseFareConversionRate;
      $this->TotalSurcharges = $TotalSurcharges;
      $this->SurchargesConversionRate = $SurchargesConversionRate;
      $this->TotalTaxes = $TotalTaxes;
      $this->TaxConversionRate = $TaxConversionRate;
      $this->MinimumPoints = $MinimumPoints;
    }

    /**
     * @return int
     */
    public function getTotalPoints()
    {
      return $this->TotalPoints;
    }

    /**
     * @param int $TotalPoints
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setTotalPoints($TotalPoints)
    {
      $this->TotalPoints = $TotalPoints;
      return $this;
    }

    /**
     * @return int
     */
    public function getBaseFarePoints()
    {
      return $this->BaseFarePoints;
    }

    /**
     * @param int $BaseFarePoints
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setBaseFarePoints($BaseFarePoints)
    {
      $this->BaseFarePoints = $BaseFarePoints;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseFareConversionRate()
    {
      return $this->BaseFareConversionRate;
    }

    /**
     * @param float $BaseFareConversionRate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setBaseFareConversionRate($BaseFareConversionRate)
    {
      $this->BaseFareConversionRate = $BaseFareConversionRate;
      return $this;
    }

    /**
     * @return int
     */
    public function getTotalSurcharges()
    {
      return $this->TotalSurcharges;
    }

    /**
     * @param int $TotalSurcharges
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setTotalSurcharges($TotalSurcharges)
    {
      $this->TotalSurcharges = $TotalSurcharges;
      return $this;
    }

    /**
     * @return float
     */
    public function getSurchargesConversionRate()
    {
      return $this->SurchargesConversionRate;
    }

    /**
     * @param float $SurchargesConversionRate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setSurchargesConversionRate($SurchargesConversionRate)
    {
      $this->SurchargesConversionRate = $SurchargesConversionRate;
      return $this;
    }

    /**
     * @return int
     */
    public function getTotalTaxes()
    {
      return $this->TotalTaxes;
    }

    /**
     * @param int $TotalTaxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setTotalTaxes($TotalTaxes)
    {
      $this->TotalTaxes = $TotalTaxes;
      return $this;
    }

    /**
     * @return float
     */
    public function getTaxConversionRate()
    {
      return $this->TaxConversionRate;
    }

    /**
     * @param float $TaxConversionRate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setTaxConversionRate($TaxConversionRate)
    {
      $this->TaxConversionRate = $TaxConversionRate;
      return $this;
    }

    /**
     * @return int
     */
    public function getMinimumPoints()
    {
      return $this->MinimumPoints;
    }

    /**
     * @param int $MinimumPoints
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointsRedemptionType
     */
    public function setMinimumPoints($MinimumPoints)
    {
      $this->MinimumPoints = $MinimumPoints;
      return $this;
    }

}
