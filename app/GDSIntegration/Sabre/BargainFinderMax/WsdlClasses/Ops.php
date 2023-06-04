<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Ops
{

    /**
     * @var FareTypes $FareTypes
     */
    protected $FareTypes = null;

    /**
     * @var int $ActionCode
     */
    protected $ActionCode = null;

    /**
     * @param FareTypes $FareTypes
     * @param int $ActionCode
     */
    public function __construct($FareTypes = null, $ActionCode = null)
    {
      $this->FareTypes = $FareTypes;
      $this->ActionCode = $ActionCode;
    }

    /**
     * @return FareTypes
     */
    public function getFareTypes()
    {
      return $this->FareTypes;
    }

    /**
     * @param FareTypes $FareTypes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Ops
     */
    public function setFareTypes($FareTypes)
    {
      $this->FareTypes = $FareTypes;
      return $this;
    }

    /**
     * @return int
     */
    public function getActionCode()
    {
      return $this->ActionCode;
    }

    /**
     * @param int $ActionCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Ops
     */
    public function setActionCode($ActionCode)
    {
      $this->ActionCode = $ActionCode;
      return $this;
    }

}
