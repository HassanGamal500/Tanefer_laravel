<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CurrencyConversionsType
{

    /**
     * @var Conversion $Conversion
     */
    protected $Conversion = null;

    /**
     * @param Conversion $Conversion
     */
    public function __construct($Conversion = null)
    {
      $this->Conversion = $Conversion;
    }

    /**
     * @return Conversion
     */
    public function getConversion()
    {
      return $this->Conversion;
    }

    /**
     * @param Conversion $Conversion
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CurrencyConversionsType
     */
    public function setConversion($Conversion)
    {
      $this->Conversion = $Conversion;
      return $this;
    }

}
