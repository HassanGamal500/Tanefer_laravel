<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class InboundOutboundPairing
{

    /**
     * @var SumWeight $Weight
     */
    protected $Weight = null;

    /**
     * @var int $Duplicates
     */
    protected $Duplicates = null;

    /**
     * @param SumWeight $Weight
     * @param int $Duplicates
     */
    public function __construct($Weight = null, $Duplicates = null)
    {
      $this->Weight = $Weight;
      $this->Duplicates = $Duplicates;
    }

    /**
     * @return SumWeight
     */
    public function getWeight()
    {
      return $this->Weight;
    }

    /**
     * @param SumWeight $Weight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\InboundOutboundPairing
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

    /**
     * @return int
     */
    public function getDuplicates()
    {
      return $this->Duplicates;
    }

    /**
     * @param int $Duplicates
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\InboundOutboundPairing
     */
    public function setDuplicates($Duplicates)
    {
      $this->Duplicates = $Duplicates;
      return $this;
    }

}
