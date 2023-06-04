<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Partitions
{

    /**
     * @var CachePartitionType $Partition
     */
    protected $Partition = null;

    /**
     * @var CachePartitionGroupType $Group
     */
    protected $Group = null;

    /**
     * @param CachePartitionType $Partition
     * @param CachePartitionGroupType $Group
     */
    public function __construct($Partition = null, $Group = null)
    {
      $this->Partition = $Partition;
      $this->Group = $Group;
    }

    /**
     * @return CachePartitionType
     */
    public function getPartition()
    {
      return $this->Partition;
    }

    /**
     * @param CachePartitionType $Partition
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Partitions
     */
    public function setPartition($Partition)
    {
      $this->Partition = $Partition;
      return $this;
    }

    /**
     * @return CachePartitionGroupType
     */
    public function getGroup()
    {
      return $this->Group;
    }

    /**
     * @param CachePartitionGroupType $Group
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Partitions
     */
    public function setGroup($Group)
    {
      $this->Group = $Group;
      return $this;
    }

}
