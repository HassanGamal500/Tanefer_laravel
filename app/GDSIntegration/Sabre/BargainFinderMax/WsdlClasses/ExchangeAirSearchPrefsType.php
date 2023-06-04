<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeAirSearchPrefsType
{

    /**
     * @var ExchangeTravelPreferencesTPA_ExtensionsType $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var boolean $ValidInterlineTicket
     */
    protected $ValidInterlineTicket = null;

    /**
     * @param boolean $ValidInterlineTicket
     */
    public function __construct($ValidInterlineTicket = null)
    {
      $this->ValidInterlineTicket = $ValidInterlineTicket;
    }

    /**
     * @return ExchangeTravelPreferencesTPA_ExtensionsType
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param ExchangeTravelPreferencesTPA_ExtensionsType $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeAirSearchPrefsType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getValidInterlineTicket()
    {
      return $this->ValidInterlineTicket;
    }

    /**
     * @param boolean $ValidInterlineTicket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeAirSearchPrefsType
     */
    public function setValidInterlineTicket($ValidInterlineTicket)
    {
      $this->ValidInterlineTicket = $ValidInterlineTicket;
      return $this;
    }

}
