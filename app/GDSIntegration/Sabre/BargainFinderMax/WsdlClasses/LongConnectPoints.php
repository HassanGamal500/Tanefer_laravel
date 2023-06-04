<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LongConnectPoints
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
     * @param int $Min
     * @param int $Max
     */
    public function __construct($Min = null, $Max = null)
    {
      $this->Min = $Min;
      $this->Max = $Max;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LongConnectPoints
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LongConnectPoints
     */
    public function setMax($Max)
    {
      $this->Max = $Max;
      return $this;
    }

}
