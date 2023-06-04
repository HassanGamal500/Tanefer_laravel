<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeTPA_ExtensionsType
{

    /**
     * @var AwardShoppingType $AwardShopping
     */
    protected $AwardShopping = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AwardShoppingType
     */
    public function getAwardShopping()
    {
      return $this->AwardShopping;
    }

    /**
     * @param AwardShoppingType $AwardShopping
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeTPA_ExtensionsType
     */
    public function setAwardShopping($AwardShopping)
    {
      $this->AwardShopping = $AwardShopping;
      return $this;
    }

}
