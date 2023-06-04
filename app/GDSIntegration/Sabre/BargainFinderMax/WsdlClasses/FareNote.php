<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareNote
{

    /**
     * @var string $FareTypeName
     */
    protected $FareTypeName = null;

    /**
     * @var int $PriorityLevel
     */
    protected $PriorityLevel = null;

    /**
     * @var string $ContentID
     */
    protected $ContentID = null;

    /**
     * @param string $FareTypeName
     * @param int $PriorityLevel
     * @param string $ContentID
     */
    public function __construct($FareTypeName = null, $PriorityLevel = null, $ContentID = null)
    {
      $this->FareTypeName = $FareTypeName;
      $this->PriorityLevel = $PriorityLevel;
      $this->ContentID = $ContentID;
    }

    /**
     * @return string
     */
    public function getFareTypeName()
    {
      return $this->FareTypeName;
    }

    /**
     * @param string $FareTypeName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareNote
     */
    public function setFareTypeName($FareTypeName)
    {
      $this->FareTypeName = $FareTypeName;
      return $this;
    }

    /**
     * @return int
     */
    public function getPriorityLevel()
    {
      return $this->PriorityLevel;
    }

    /**
     * @param int $PriorityLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareNote
     */
    public function setPriorityLevel($PriorityLevel)
    {
      $this->PriorityLevel = $PriorityLevel;
      return $this;
    }

    /**
     * @return string
     */
    public function getContentID()
    {
      return $this->ContentID;
    }

    /**
     * @param string $ContentID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareNote
     */
    public function setContentID($ContentID)
    {
      $this->ContentID = $ContentID;
      return $this;
    }

}
