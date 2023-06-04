<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Score
{

    /**
     * @var int $Value
     */
    protected $Value = null;

    /**
     * @var string $Carrier
     */
    protected $Carrier = null;

    /**
     * @param int $Value
     * @param string $Carrier
     */
    public function __construct($Value = null, $Carrier = null)
    {
      $this->Value = $Value;
      $this->Carrier = $Carrier;
    }

    /**
     * @return int
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param int $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Score
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
      return $this->Carrier;
    }

    /**
     * @param string $Carrier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Score
     */
    public function setCarrier($Carrier)
    {
      $this->Carrier = $Carrier;
      return $this;
    }

}
