<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TPA_ExtensionsForTravelPreference
{

    /**
     * @var FlexibleFaresType $FlexibleFares
     */
    protected $FlexibleFares = null;



    /**
     * @param FlexibleFaresType $FlexibleFares
     */
    public function __construct($FlexibleFares = null)
    {
      $this->FlexibleFares = $FlexibleFares;
    }

    /**
     * @return FlexibleFaresType
     */
    public function getFlexibleFares()
    {
      return $this->FlexibleFares;
    }

    /**
     * @param FlexibleFaresType $FlexibleFares
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TPA_ExtensionsForTravelPreference
     */
    public function setFlexibleFares($FlexibleFares)
    {
      $this->FlexibleFares = $FlexibleFares;
      return $this;
    }

}
