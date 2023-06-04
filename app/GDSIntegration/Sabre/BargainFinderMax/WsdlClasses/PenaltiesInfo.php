<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PenaltiesInfo
{

    /**
     * @var Penalty $Penalty
     */
    protected $Penalty = null;

    /**
     * @param Penalty $Penalty
     */
    public function __construct($Penalty = null)
    {
      $this->Penalty = $Penalty;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PenaltiesInfo
     */
    public function setPenalty($Penalty)
    {
      $this->Penalty = $Penalty;
      return $this;
    }

}
