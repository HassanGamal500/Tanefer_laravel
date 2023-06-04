<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareRestrictPref
{

    /**
     * @var AdvResTicketingType $AdvResTicketing
     */
    protected $AdvResTicketing = null;

    /**
     * @var StayRestrictionsType $StayRestrictions
     */
    protected $StayRestrictions = null;

    /**
     * @var VoluntaryChangesType $VoluntaryChanges
     */
    protected $VoluntaryChanges = null;

    /**
     * @param AdvResTicketingType $AdvResTicketing
     * @param StayRestrictionsType $StayRestrictions
     * @param VoluntaryChangesType $VoluntaryChanges
     */
    public function __construct($AdvResTicketing = null, $StayRestrictions = null, $VoluntaryChanges = null)
    {
      $this->AdvResTicketing = $AdvResTicketing;
      $this->StayRestrictions = $StayRestrictions;
      $this->VoluntaryChanges = $VoluntaryChanges;
    }

    /**
     * @return AdvResTicketingType
     */
    public function getAdvResTicketing()
    {
      return $this->AdvResTicketing;
    }

    /**
     * @param AdvResTicketingType $AdvResTicketing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareRestrictPref
     */
    public function setAdvResTicketing($AdvResTicketing)
    {
      $this->AdvResTicketing = $AdvResTicketing;
      return $this;
    }

    /**
     * @return StayRestrictionsType
     */
    public function getStayRestrictions()
    {
      return $this->StayRestrictions;
    }

    /**
     * @param StayRestrictionsType $StayRestrictions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareRestrictPref
     */
    public function setStayRestrictions($StayRestrictions)
    {
      $this->StayRestrictions = $StayRestrictions;
      return $this;
    }

    /**
     * @return VoluntaryChangesType
     */
    public function getVoluntaryChanges()
    {
      return $this->VoluntaryChanges;
    }

    /**
     * @param VoluntaryChangesType $VoluntaryChanges
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareRestrictPref
     */
    public function setVoluntaryChanges($VoluntaryChanges)
    {
      $this->VoluntaryChanges = $VoluntaryChanges;
      return $this;
    }

}
