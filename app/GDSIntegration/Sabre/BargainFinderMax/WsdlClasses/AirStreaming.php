<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirStreaming
{

    /**
     * @var anonymous380 $Method
     */
    protected $Method = null;

    /**
     * @var int $MaxItinsPerChunk
     */
    protected $MaxItinsPerChunk = null;

    /**
     * @param anonymous380 $Method
     * @param int $MaxItinsPerChunk
     */
    public function __construct($Method = null, $MaxItinsPerChunk = null)
    {
      $this->Method = $Method;
      $this->MaxItinsPerChunk = $MaxItinsPerChunk;
    }

    /**
     * @return anonymous380
     */
    public function getMethod()
    {
      return $this->Method;
    }

    /**
     * @param anonymous380 $Method
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirStreaming
     */
    public function setMethod($Method)
    {
      $this->Method = $Method;
      return $this;
    }

    /**
     * @return int
     */
    public function getMaxItinsPerChunk()
    {
      return $this->MaxItinsPerChunk;
    }

    /**
     * @param int $MaxItinsPerChunk
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirStreaming
     */
    public function setMaxItinsPerChunk($MaxItinsPerChunk)
    {
      $this->MaxItinsPerChunk = $MaxItinsPerChunk;
      return $this;
    }

}
