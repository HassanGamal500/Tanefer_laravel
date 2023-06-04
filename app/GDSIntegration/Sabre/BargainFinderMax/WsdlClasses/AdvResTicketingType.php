<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AdvResTicketingType
{

    /**
     * @var AdvReservation $AdvReservation
     */
    protected $AdvReservation = null;

    /**
     * @var AdvTicketing $AdvTicketing
     */
    protected $AdvTicketing = null;

    /**
     * @var boolean $AdvResInd
     */
    protected $AdvResInd = null;

    /**
     * @var boolean $AdvTicketingInd
     */
    protected $AdvTicketingInd = null;

    /**
     * @param boolean $AdvResInd
     * @param boolean $AdvTicketingInd
     */
    public function __construct($AdvResInd = null, $AdvTicketingInd = null)
    {
      $this->AdvResInd = $AdvResInd;
      $this->AdvTicketingInd = $AdvTicketingInd;
    }

    /**
     * @return AdvReservation
     */
    public function getAdvReservation()
    {
      return $this->AdvReservation;
    }

    /**
     * @param AdvReservation $AdvReservation
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvResTicketingType
     */
    public function setAdvReservation($AdvReservation)
    {
      $this->AdvReservation = $AdvReservation;
      return $this;
    }

    /**
     * @return AdvTicketing
     */
    public function getAdvTicketing()
    {
      return $this->AdvTicketing;
    }

    /**
     * @param AdvTicketing $AdvTicketing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvResTicketingType
     */
    public function setAdvTicketing($AdvTicketing)
    {
      $this->AdvTicketing = $AdvTicketing;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAdvResInd()
    {
      return $this->AdvResInd;
    }

    /**
     * @param boolean $AdvResInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvResTicketingType
     */
    public function setAdvResInd($AdvResInd)
    {
      $this->AdvResInd = $AdvResInd;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAdvTicketingInd()
    {
      return $this->AdvTicketingInd;
    }

    /**
     * @param boolean $AdvTicketingInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AdvResTicketingType
     */
    public function setAdvTicketingInd($AdvTicketingInd)
    {
      $this->AdvTicketingInd = $AdvTicketingInd;
      return $this;
    }

}
