<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CachePartitionType
{

    /**
     * @var PartitionNameType $Name
     */
    protected $Name = null;

    /**
     * @param PartitionNameType $Name
     */
    public function __construct($Name = null)
    {
      $this->Name = $Name;
    }

    /**
     * @return PartitionNameType
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param PartitionNameType $Name
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CachePartitionType
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

}
