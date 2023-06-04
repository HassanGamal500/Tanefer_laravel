<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class VoluntaryChangesType
{

    /**
     * @var Penalty $Penalty
     */
    protected $Penalty = null;

    /**
     * @var boolean $VolChangeInd
     */
    protected $VolChangeInd = null;

    /**
     * @param boolean $VolChangeInd
     */
    public function __construct($VolChangeInd = null)
    {
      $this->VolChangeInd = $VolChangeInd;
    }

    /**
     * @return Penalty
     */
    public function getPenalty()
    {
      return $this->Penalty;
    }

    /**
     * @param Penalty $Penalty
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VoluntaryChangesType
     */
    public function setPenalty($Penalty)
    {
      $this->Penalty = $Penalty;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getVolChangeInd()
    {
      return $this->VolChangeInd;
    }

    /**
     * @param boolean $VolChangeInd
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VoluntaryChangesType
     */
    public function setVolChangeInd($VolChangeInd)
    {
      $this->VolChangeInd = $VolChangeInd;
      return $this;
    }

}
