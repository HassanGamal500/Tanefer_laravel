<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MultipleTravelerGroups
{

    /**
     * @var int $GroupNumber
     */
    protected $GroupNumber = null;

    /**
     * @var boolean $PrimaryGroup
     */
    protected $PrimaryGroup = null;

    /**
     * @param int $GroupNumber
     * @param boolean $PrimaryGroup
     */
    public function __construct($GroupNumber = null, $PrimaryGroup = null)
    {
      $this->GroupNumber = $GroupNumber;
      $this->PrimaryGroup = $PrimaryGroup;
    }

    /**
     * @return int
     */
    public function getGroupNumber()
    {
      return $this->GroupNumber;
    }

    /**
     * @param int $GroupNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MultipleTravelerGroups
     */
    public function setGroupNumber($GroupNumber)
    {
      $this->GroupNumber = $GroupNumber;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getPrimaryGroup()
    {
      return $this->PrimaryGroup;
    }

    /**
     * @param boolean $PrimaryGroup
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MultipleTravelerGroups
     */
    public function setPrimaryGroup($PrimaryGroup)
    {
      $this->PrimaryGroup = $PrimaryGroup;
      return $this;
    }

}
