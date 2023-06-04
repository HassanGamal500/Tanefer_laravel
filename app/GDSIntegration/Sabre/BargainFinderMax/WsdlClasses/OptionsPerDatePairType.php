<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OptionsPerDatePairType
{

    /**
     * @var ISellDateType $Departure
     */
    protected $Departure = null;

    /**
     * @var ISellDateType $Return
     */
    protected $Return = null;

    /**
     * @var int $Min
     */
    protected $Min = null;

    /**
     * @var int $Max
     */
    protected $Max = null;

    /**
     * @param ISellDateType $Departure
     * @param ISellDateType $Return
     * @param int $Min
     * @param int $Max
     */
    public function __construct($Departure = null, $Return = null, $Min = null, $Max = null)
    {
      $this->Departure = $Departure;
      $this->Return = $Return;
      $this->Min = $Min;
      $this->Max = $Max;
    }

    /**
     * @return ISellDateType
     */
    public function getDeparture()
    {
      return $this->Departure;
    }

    /**
     * @param ISellDateType $Departure
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OptionsPerDatePairType
     */
    public function setDeparture($Departure)
    {
      $this->Departure = $Departure;
      return $this;
    }

    /**
     * @return ISellDateType
     */
    public function getReturn()
    {
      return $this->Return;
    }

    /**
     * @param ISellDateType $Return
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OptionsPerDatePairType
     */
    public function setReturn($Return)
    {
      $this->Return = $Return;
      return $this;
    }

    /**
     * @return int
     */
    public function getMin()
    {
      return $this->Min;
    }

    /**
     * @param int $Min
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OptionsPerDatePairType
     */
    public function setMin($Min)
    {
      $this->Min = $Min;
      return $this;
    }

    /**
     * @return int
     */
    public function getMax()
    {
      return $this->Max;
    }

    /**
     * @param int $Max
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OptionsPerDatePairType
     */
    public function setMax($Max)
    {
      $this->Max = $Max;
      return $this;
    }

}
