<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LongConnectTime
{

    /**
     * @var int $Min
     */
    protected $Min = null;

    /**
     * @var int $Max
     */
    protected $Max = null;

    /**
     * @var boolean $Enable
     */
    protected $Enable = null;

    /**
     * @var CountOrPercentage $NumberOfSolutions
     */
    protected $NumberOfSolutions = null;

    /**
     * @param int $Min
     * @param int $Max
     * @param boolean $Enable
     * @param CountOrPercentage $NumberOfSolutions
     */
    public function __construct($Min = null, $Max = null, $Enable = null, $NumberOfSolutions = null)
    {
      $this->Min = $Min;
      $this->Max = $Max;
      $this->Enable = $Enable;
      $this->NumberOfSolutions = $NumberOfSolutions;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LongConnectTime
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LongConnectTime
     */
    public function setMax($Max)
    {
      $this->Max = $Max;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getEnable()
    {
      return $this->Enable;
    }

    /**
     * @param boolean $Enable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LongConnectTime
     */
    public function setEnable($Enable)
    {
      $this->Enable = $Enable;
      return $this;
    }

    /**
     * @return CountOrPercentage
     */
    public function getNumberOfSolutions()
    {
      return $this->NumberOfSolutions;
    }

    /**
     * @param CountOrPercentage $NumberOfSolutions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LongConnectTime
     */
    public function setNumberOfSolutions($NumberOfSolutions)
    {
      $this->NumberOfSolutions = $NumberOfSolutions;
      return $this;
    }

}
