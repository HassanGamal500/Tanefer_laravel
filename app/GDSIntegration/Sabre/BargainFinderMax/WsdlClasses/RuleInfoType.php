<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RuleInfoType
{

    /**
     * @var ResTicketingRules $ResTicketingRules
     */
    protected $ResTicketingRules = null;

    /**
     * @var StayRestrictionsType $LengthOfStayRules
     */
    protected $LengthOfStayRules = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ResTicketingRules
     */
    public function getResTicketingRules()
    {
      return $this->ResTicketingRules;
    }

    /**
     * @param ResTicketingRules $ResTicketingRules
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RuleInfoType
     */
    public function setResTicketingRules($ResTicketingRules)
    {
      $this->ResTicketingRules = $ResTicketingRules;
      return $this;
    }

    /**
     * @return StayRestrictionsType
     */
    public function getLengthOfStayRules()
    {
      return $this->LengthOfStayRules;
    }

    /**
     * @param StayRestrictionsType $LengthOfStayRules
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RuleInfoType
     */
    public function setLengthOfStayRules($LengthOfStayRules)
    {
      $this->LengthOfStayRules = $LengthOfStayRules;
      return $this;
    }

}
