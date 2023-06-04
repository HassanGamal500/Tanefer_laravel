<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RoutingDefinitionType
{

    /**
     * @var RoutingLegType[] $RoutingLeg
     */
    protected $RoutingLeg = null;

    /**
     * @var boolean $AddWildcards
     */
    protected $AddWildcards = null;

    /**
     * @param RoutingLegType[] $RoutingLeg
     * @param boolean $AddWildcards
     */
    public function __construct(array $RoutingLeg = null, $AddWildcards = null)
    {
      $this->RoutingLeg = $RoutingLeg;
      $this->AddWildcards = $AddWildcards;
    }

    /**
     * @return RoutingLegType[]
     */
    public function getRoutingLeg()
    {
      return $this->RoutingLeg;
    }

    /**
     * @param RoutingLegType[] $RoutingLeg
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RoutingDefinitionType
     */
    public function setRoutingLeg(array $RoutingLeg)
    {
      $this->RoutingLeg = $RoutingLeg;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAddWildcards()
    {
      return $this->AddWildcards;
    }

    /**
     * @param boolean $AddWildcards
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RoutingDefinitionType
     */
    public function setAddWildcards($AddWildcards)
    {
      $this->AddWildcards = $AddWildcards;
      return $this;
    }

}
