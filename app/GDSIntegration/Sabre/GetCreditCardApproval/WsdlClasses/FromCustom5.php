<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class FromCustom5
{

    /**
     * @var PartyId $PartyId
     */
    protected $PartyId = null;

    /**
     * @var nonemptystring $Role
     */
    protected $Role = null;

    /**
     * @param PartyId $PartyId
     * @param nonemptystring $Role
     */
    public function __construct($PartyId = null, $Role = null)
    {
      $this->PartyId = $PartyId;
      $this->Role = $Role;
    }

    /**
     * @return PartyId
     */
    public function getPartyId()
    {
      return $this->PartyId;
    }

    /**
     * @param PartyId $PartyId
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FromCustom5
     */
    public function setPartyId($PartyId)
    {
      $this->PartyId = $PartyId;
      return $this;
    }

    /**
     * @return nonemptystring
     */
    public function getRole()
    {
      return $this->Role;
    }

    /**
     * @param nonemptystring $Role
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\FromCustom5
     */
    public function setRole($Role)
    {
      $this->Role = $Role;
      return $this;
    }

}
