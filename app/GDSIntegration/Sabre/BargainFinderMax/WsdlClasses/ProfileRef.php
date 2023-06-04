<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ProfileRef
{

    /**
     * @var UniqueID_Type $UniqueID
     */
    protected $UniqueID = null;

    /**
     * @param UniqueID_Type $UniqueID
     */
    public function __construct($UniqueID = null)
    {
      $this->UniqueID = $UniqueID;
    }

    /**
     * @return UniqueID_Type
     */
    public function getUniqueID()
    {
      return $this->UniqueID;
    }

    /**
     * @param UniqueID_Type $UniqueID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ProfileRef
     */
    public function setUniqueID($UniqueID)
    {
      $this->UniqueID = $UniqueID;
      return $this;
    }

}
