<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BaggageInformationType
{

    /**
     * @var Segment[] $Segment
     */
    protected $Segment = null;

    /**
     * @var Allowance[] $Allowance
     */
    protected $Allowance = null;

    /**
     * @var Charge[] $Charge
     */
    protected $Charge = null;

    /**
     * @var BaggageProvisionType $ProvisionType
     */
    protected $ProvisionType = null;

    /**
     * @var AirlineCodeType $AirlineCode
     */
    protected $AirlineCode = null;

    /**
     * @param Segment[] $Segment
     * @param BaggageProvisionType $ProvisionType
     * @param AirlineCodeType $AirlineCode
     */
    public function __construct(array $Segment = null, $ProvisionType = null, $AirlineCode = null)
    {
      $this->Segment = $Segment;
      $this->ProvisionType = $ProvisionType;
      $this->AirlineCode = $AirlineCode;
    }

    /**
     * @return Segment[]
     */
    public function getSegment()
    {
      return $this->Segment;
    }

    /**
     * @param Segment[] $Segment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageInformationType
     */
    public function setSegment(array $Segment)
    {
      $this->Segment = $Segment;
      return $this;
    }

    /**
     * @return Allowance[]
     */
    public function getAllowance()
    {
      return $this->Allowance;
    }

    /**
     * @param Allowance[] $Allowance
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageInformationType
     */
    public function setAllowance(array $Allowance = null)
    {
      $this->Allowance = $Allowance;
      return $this;
    }

    /**
     * @return Charge[]
     */
    public function getCharge()
    {
      return $this->Charge;
    }

    /**
     * @param Charge[] $Charge
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageInformationType
     */
    public function setCharge(array $Charge = null)
    {
      $this->Charge = $Charge;
      return $this;
    }

    /**
     * @return BaggageProvisionType
     */
    public function getProvisionType()
    {
      return $this->ProvisionType;
    }

    /**
     * @param BaggageProvisionType $ProvisionType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageInformationType
     */
    public function setProvisionType($ProvisionType)
    {
      $this->ProvisionType = $ProvisionType;
      return $this;
    }

    /**
     * @return AirlineCodeType
     */
    public function getAirlineCode()
    {
      return $this->AirlineCode;
    }

    /**
     * @param AirlineCodeType $AirlineCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageInformationType
     */
    public function setAirlineCode($AirlineCode)
    {
      $this->AirlineCode = $AirlineCode;
      return $this;
    }

}
