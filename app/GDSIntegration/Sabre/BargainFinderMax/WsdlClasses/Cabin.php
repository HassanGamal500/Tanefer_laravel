<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Cabin
{

    /**
     * @var string $Cabin
     */
    protected $Cabin = null;

    /**
     * @param string $Cabin
     */
    public function __construct($Cabin = null)
    {
      $this->Cabin = $Cabin;
    }

    /**
     * @return string
     */
    public function getCabin()
    {
      return $this->Cabin;
    }

    /**
     * @param string $Cabin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Cabin
     */
    public function setCabin($Cabin)
    {
      $this->Cabin = $Cabin;
      return $this;
    }

}
