<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelerPersona
{

    /**
     * @var anonymous363 $Name
     */
    protected $Name = null;

    /**
     * @param anonymous363 $Name
     */
    public function __construct($Name = null)
    {
      $this->Name = $Name;
    }

    /**
     * @return anonymous363
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param anonymous363 $Name
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerPersona
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

}
