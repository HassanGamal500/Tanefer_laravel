<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DefaultCustom
{

    /**
     * @var CountOrPercentage $Options
     */
    protected $Options = null;

    /**
     * @param CountOrPercentage $Options
     */
    public function __construct($Options = null)
    {
      $this->Options = $Options;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DefaultCustom
     */
    public function setOptions($Options)
    {
      $this->Options = $Options;
      return $this;
    }

}
