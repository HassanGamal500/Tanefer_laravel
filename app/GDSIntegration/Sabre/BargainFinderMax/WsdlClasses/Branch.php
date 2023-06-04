<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Branch
{

    /**
     * @var string $Name
     */
    protected $Name = null;

    /**
     * @param string $Name
     */
    public function __construct($Name = null)
    {
      $this->Name = $Name;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param string $Name
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Branch
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

}
