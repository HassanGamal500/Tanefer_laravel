<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Config
{

    /**
     * @var string $ID
     */
    protected $ID = null;

    /**
     * @param string $ID
     */
    public function __construct($ID = null)
    {
      $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getID()
    {
      return $this->ID;
    }

    /**
     * @param string $ID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Config
     */
    public function setID($ID)
    {
      $this->ID = $ID;
      return $this;
    }

}
