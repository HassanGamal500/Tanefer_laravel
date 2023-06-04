<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SellingFareDataList
{

    /**
     * @var SellingFareDataType $SellingFareData
     */
    protected $SellingFareData = null;

    /**
     * @param SellingFareDataType $SellingFareData
     */
    public function __construct($SellingFareData = null)
    {
      $this->SellingFareData = $SellingFareData;
    }

    /**
     * @return SellingFareDataType
     */
    public function getSellingFareData()
    {
      return $this->SellingFareData;
    }

    /**
     * @param SellingFareDataType $SellingFareData
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SellingFareDataList
     */
    public function setSellingFareData($SellingFareData)
    {
      $this->SellingFareData = $SellingFareData;
      return $this;
    }

}
