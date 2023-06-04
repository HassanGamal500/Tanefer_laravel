<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangePOSType
{

    /**
     * @var ExchangeSourceType $Source
     */
    protected $Source = null;

    /**
     * @param ExchangeSourceType $Source
     */
    public function __construct($Source = null)
    {
      $this->Source = $Source;
    }

    /**
     * @return ExchangeSourceType
     */
    public function getSource()
    {
      return $this->Source;
    }

    /**
     * @param ExchangeSourceType $Source
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangePOSType
     */
    public function setSource($Source)
    {
      $this->Source = $Source;
      return $this;
    }

}
