<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class HeaderCustom5
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\HeaderCustom5
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

}
