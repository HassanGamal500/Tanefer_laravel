<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ShelvesDefinitionsType
{

    /**
     * @var ShelfDefinitionType[] $ShelfDefinition
     */
    protected $ShelfDefinition = null;

    /**
     * @param ShelfDefinitionType[] $ShelfDefinition
     */
    public function __construct(array $ShelfDefinition = null)
    {
      $this->ShelfDefinition = $ShelfDefinition;
    }

    /**
     * @return ShelfDefinitionType[]
     */
    public function getShelfDefinition()
    {
      return $this->ShelfDefinition;
    }

    /**
     * @param ShelfDefinitionType[] $ShelfDefinition
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelvesDefinitionsType
     */
    public function setShelfDefinition(array $ShelfDefinition)
    {
      $this->ShelfDefinition = $ShelfDefinition;
      return $this;
    }

}
