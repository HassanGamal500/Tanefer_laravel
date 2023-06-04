<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareCalcLineType
{

    /**
     * @var string $Info
     */
    protected $Info = null;

    /**
     * @param string $Info
     */
    public function __construct($Info = null)
    {
      $this->Info = $Info;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
      return $this->Info;
    }

    /**
     * @param string $Info
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareCalcLineType
     */
    public function setInfo($Info)
    {
      $this->Info = $Info;
      return $this;
    }

}
