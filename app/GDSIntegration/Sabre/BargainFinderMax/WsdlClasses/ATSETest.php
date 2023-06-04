<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ATSETest
{

    /**
     * @var string $Feature
     */
    protected $Feature = null;

    /**
     * @param string $Feature
     */
    public function __construct($Feature = null)
    {
      $this->Feature = $Feature;
    }

    /**
     * @return string
     */
    public function getFeature()
    {
      return $this->Feature;
    }

    /**
     * @param string $Feature
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ATSETest
     */
    public function setFeature($Feature)
    {
      $this->Feature = $Feature;
      return $this;
    }

}
