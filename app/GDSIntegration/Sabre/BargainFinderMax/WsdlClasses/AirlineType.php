<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirlineType
{

    /**
     * @var CarrierCode $Operating
     */
    protected $Operating = null;

    /**
     * @var CarrierCode $Marketing
     */
    protected $Marketing = null;

    /**
     * @param CarrierCode $Operating
     * @param CarrierCode $Marketing
     */
    public function __construct($Operating = null, $Marketing = null)
    {
      $this->Operating = $Operating;
      $this->Marketing = $Marketing;
    }

    /**
     * @return CarrierCode
     */
    public function getOperating()
    {
      return $this->Operating;
    }

    /**
     * @param CarrierCode $Operating
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineType
     */
    public function setOperating($Operating)
    {
      $this->Operating = $Operating;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getMarketing()
    {
      return $this->Marketing;
    }

    /**
     * @param CarrierCode $Marketing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineType
     */
    public function setMarketing($Marketing)
    {
      $this->Marketing = $Marketing;
      return $this;
    }

}
