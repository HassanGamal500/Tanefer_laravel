<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class BodyCustom4
{

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @param string $any
     */
    public function __construct($any = null)
    {
      $this->any = $any;
    }

    /**
     * @return string
     */
    public function getAny()
    {
      return $this->any;
    }

    /**
     * @param string $any
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\BodyCustom4
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

}
