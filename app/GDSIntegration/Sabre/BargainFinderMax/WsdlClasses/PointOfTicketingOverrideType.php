<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PointOfTicketingOverrideType
{

    /**
     * @var StringLength1to8 $Code
     */
    protected $Code = null;

    /**
     * @param StringLength1to8 $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return StringLength1to8
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param StringLength1to8 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PointOfTicketingOverrideType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
