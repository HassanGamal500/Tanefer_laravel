<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SpanishFamilyDiscount
{

    /**
     * @var anonymous271 $Level
     */
    protected $Level = null;

    /**
     * @param anonymous271 $Level
     */
    public function __construct($Level = null)
    {
      $this->Level = $Level;
    }

    /**
     * @return anonymous271
     */
    public function getLevel()
    {
      return $this->Level;
    }

    /**
     * @param anonymous271 $Level
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SpanishFamilyDiscount
     */
    public function setLevel($Level)
    {
      $this->Level = $Level;
      return $this;
    }

}
