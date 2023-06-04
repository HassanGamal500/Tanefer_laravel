<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MileageDisplayType
{

    /**
     * @var string $Type
     */
    protected $Type = null;

    /**
     * @var AlphaLength3 $City
     */
    protected $City = null;

    /**
     * @var int $Surcharge
     */
    protected $Surcharge = null;

    /**
     * @param string $Type
     * @param AlphaLength3 $City
     * @param int $Surcharge
     */
    public function __construct($Type = null, $City = null, $Surcharge = null)
    {
      $this->Type = $Type;
      $this->City = $City;
      $this->Surcharge = $Surcharge;
    }

    /**
     * @return string
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param string $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MileageDisplayType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return AlphaLength3
     */
    public function getCity()
    {
      return $this->City;
    }

    /**
     * @param AlphaLength3 $City
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MileageDisplayType
     */
    public function setCity($City)
    {
      $this->City = $City;
      return $this;
    }

    /**
     * @return int
     */
    public function getSurcharge()
    {
      return $this->Surcharge;
    }

    /**
     * @param int $Surcharge
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MileageDisplayType
     */
    public function setSurcharge($Surcharge)
    {
      $this->Surcharge = $Surcharge;
      return $this;
    }

}
