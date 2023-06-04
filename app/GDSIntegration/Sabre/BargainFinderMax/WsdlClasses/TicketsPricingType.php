<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TicketsPricingType
{

    /**
     * @var TicketPricingType[] $Ticket
     */
    protected $Ticket = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return TicketPricingType[]
     */
    public function getTicket()
    {
      return $this->Ticket;
    }

    /**
     * @param TicketPricingType[] $Ticket
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketsPricingType
     */
    public function setTicket(array $Ticket = null)
    {
      $this->Ticket = $Ticket;
      return $this;
    }

}
