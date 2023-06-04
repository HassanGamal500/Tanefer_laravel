<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ItinSource
{

    /**
     * @var string $Source
     */
    protected $Source = null;

    /**
     * @param string $Source
     */
    public function __construct($Source = null)
    {
      $this->Source = $Source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
      return $this->Source;
    }

    /**
     * @param string $Source
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ItinSource
     */
    public function setSource($Source)
    {
      $this->Source = $Source;
      return $this;
    }

}
