<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class VoluntaryChangesSMPType
{

    /**
     * @var Penalty[] $Penalty
     */
    protected $Penalty = null;

    /**
     * @var anonymous9 $Match
     */
    protected $Match = null;

    /**
     * @param anonymous9 $Match
     */
    public function __construct($Match = null)
    {
      $this->Match = $Match;
    }

    /**
     * @return Penalty[]
     */
    public function getPenalty()
    {
      return $this->Penalty;
    }

    /**
     * @param Penalty[] $Penalty
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VoluntaryChangesSMPType
     */
    public function setPenalty(array $Penalty = null)
    {
      $this->Penalty = $Penalty;
      return $this;
    }

    /**
     * @return anonymous9
     */
    public function getMatch()
    {
      return $this->Match;
    }

    /**
     * @param anonymous9 $Match
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\VoluntaryChangesSMPType
     */
    public function setMatch($Match)
    {
      $this->Match = $Match;
      return $this;
    }

}
