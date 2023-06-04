<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternateAirportMileage
{

    /**
     * @var string $Number
     */
    protected $Number = null;

    /**
     * @var boolean $AllowBorderCross
     */
    protected $AllowBorderCross = null;

    /**
     * @param string $Number
     * @param boolean $AllowBorderCross
     */
    public function __construct($Number = null, $AllowBorderCross = null)
    {
      $this->Number = $Number;
      $this->AllowBorderCross = $AllowBorderCross;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param string $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateAirportMileage
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAllowBorderCross()
    {
      return $this->AllowBorderCross;
    }

    /**
     * @param boolean $AllowBorderCross
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateAirportMileage
     */
    public function setAllowBorderCross($AllowBorderCross)
    {
      $this->AllowBorderCross = $AllowBorderCross;
      return $this;
    }

}
