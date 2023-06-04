<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareGroupType
{

    /**
     * @var string $FareTypeName
     */
    protected $FareTypeName = null;

    /**
     * @param string $FareTypeName
     */
    public function __construct($FareTypeName = null)
    {
      $this->FareTypeName = $FareTypeName;
    }

    /**
     * @return string
     */
    public function getFareTypeName()
    {
      return $this->FareTypeName;
    }

    /**
     * @param string $FareTypeName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareGroupType
     */
    public function setFareTypeName($FareTypeName)
    {
      $this->FareTypeName = $FareTypeName;
      return $this;
    }

}
