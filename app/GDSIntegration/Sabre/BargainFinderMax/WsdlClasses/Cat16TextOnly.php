<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Cat16TextOnly
{

    /**
     * @var FareBasisCodeType $FareBasisCode
     */
    protected $FareBasisCode = null;

    /**
     * @var int $FareComponentID
     */
    protected $FareComponentID = null;

    /**
     * @param FareBasisCodeType $FareBasisCode
     * @param int $FareComponentID
     */
    public function __construct($FareBasisCode = null, $FareComponentID = null)
    {
      $this->FareBasisCode = $FareBasisCode;
      $this->FareComponentID = $FareComponentID;
    }

    /**
     * @return FareBasisCodeType
     */
    public function getFareBasisCode()
    {
      return $this->FareBasisCode;
    }

    /**
     * @param FareBasisCodeType $FareBasisCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Cat16TextOnly
     */
    public function setFareBasisCode($FareBasisCode)
    {
      $this->FareBasisCode = $FareBasisCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getFareComponentID()
    {
      return $this->FareComponentID;
    }

    /**
     * @param int $FareComponentID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Cat16TextOnly
     */
    public function setFareComponentID($FareComponentID)
    {
      $this->FareComponentID = $FareComponentID;
      return $this;
    }

}
