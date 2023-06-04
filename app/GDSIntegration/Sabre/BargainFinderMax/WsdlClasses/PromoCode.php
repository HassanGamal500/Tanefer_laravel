<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PromoCode
{

    /**
     * @var anonymous121 $Value
     */
    protected $Value = null;

    /**
     * @param anonymous121 $Value
     */
    public function __construct($Value = null)
    {
      $this->Value = $Value;
    }

    /**
     * @return anonymous121
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param anonymous121 $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PromoCode
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
