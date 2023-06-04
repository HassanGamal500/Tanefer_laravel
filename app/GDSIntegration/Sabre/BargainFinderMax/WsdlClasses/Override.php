<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Override
{

    /**
     * @var CarrierCode $Code
     */
    protected $Code = null;

    /**
     * @var CountOrPercentage $Options
     */
    protected $Options = null;

    /**
     * @param CarrierCode $Code
     * @param CountOrPercentage $Options
     */
    public function __construct($Code = null, $Options = null)
    {
      $this->Code = $Code;
      $this->Options = $Options;
    }

    /**
     * @return CarrierCode
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CarrierCode $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Override
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return CountOrPercentage
     */
    public function getOptions()
    {
      return $this->Options;
    }

    /**
     * @param CountOrPercentage $Options
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Override
     */
    public function setOptions($Options)
    {
      $this->Options = $Options;
      return $this;
    }

}
