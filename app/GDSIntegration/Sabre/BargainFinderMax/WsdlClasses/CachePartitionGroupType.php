<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CachePartitionGroupType
{

    /**
     * @var CachePartitionType[] $Partition
     */
    protected $Partition = null;

    /**
     * @param CachePartitionType[] $Partition
     */
    public function __construct(array $Partition = null)
    {
      $this->Partition = $Partition;
    }

    /**
     * @return CachePartitionType[]
     */
    public function getPartition()
    {
      return $this->Partition;
    }

    /**
     * @param CachePartitionType[] $Partition
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CachePartitionGroupType
     */
    public function setPartition(array $Partition)
    {
      $this->Partition = $Partition;
      return $this;
    }

}
