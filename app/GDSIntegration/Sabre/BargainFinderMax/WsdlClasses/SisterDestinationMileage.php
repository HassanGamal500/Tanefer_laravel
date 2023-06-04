<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SisterDestinationMileage
{

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @var boolean $AllowBorderCross
     */
    protected $AllowBorderCross = null;

    /**
     * @param int $Number
     * @param boolean $AllowBorderCross
     */
    public function __construct($Number = null, $AllowBorderCross = null)
    {
      $this->Number = $Number;
      $this->AllowBorderCross = $AllowBorderCross;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param int $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SisterDestinationMileage
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SisterDestinationMileage
     */
    public function setAllowBorderCross($AllowBorderCross)
    {
      $this->AllowBorderCross = $AllowBorderCross;
      return $this;
    }

}
