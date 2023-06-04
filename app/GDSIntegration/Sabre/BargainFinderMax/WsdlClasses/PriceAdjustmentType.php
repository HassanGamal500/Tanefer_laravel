<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PriceAdjustmentType
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
     * @var TotalTax $TotalTax
     */
    protected $TotalTax = null;

    /**
     * @var TotalFare $TotalFare
     */
    protected $TotalFare = null;

    
    public function __construct()
    {
    
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceAdjustmentType
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceAdjustmentType
     */
    public function setEquivFare($EquivFare)
    {
      $this->EquivFare = $EquivFare;
      return $this;
    }

    /**
     * @return TotalTax
     */
    public function getTotalTax()
    {
      return $this->TotalTax;
    }

    /**
     * @param TotalTax $TotalTax
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceAdjustmentType
     */
    public function setTotalTax($TotalTax)
    {
      $this->TotalTax = $TotalTax;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PriceAdjustmentType
     */
    public function setTotalFare($TotalFare)
    {
      $this->TotalFare = $TotalFare;
      return $this;
    }

}
