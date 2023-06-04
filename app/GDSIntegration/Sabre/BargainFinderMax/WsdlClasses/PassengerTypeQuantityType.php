<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class PassengerTypeQuantityType extends TravelerCountType
{

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var string $Alias
     */
    protected $Alias = null;

    /**
     * @var boolean $Changeable
     */
    protected $Changeable = null;

    /**
     * @var int $Index
     */
    protected $Index = null;

    /**
     * @var int $RequestedPassengerIndex
     */
    protected $RequestedPassengerIndex = null;

    /**
     * @param Numeric0to999 $ID
     * @param Numeric0to999 $Age
     * @param PassengerCodeType $Code
     * @param StringLength1to32 $CodeContext
     * @param anyURI $URI
     * @param Numeric1to999 $Quantity
     * @param string $Alias
     * @param boolean $Changeable
     * @param int $Index
     * @param int $RequestedPassengerIndex
     */
    public function __construct($ID = null, $Age = null, $Code = null, $CodeContext = null, $URI = null, $Quantity = null, $Alias = null, $Changeable = null, $Index = null, $RequestedPassengerIndex = null)
    {
      parent::__construct($ID, $Age, $Code, $CodeContext, $URI, $Quantity);
      $this->Alias = $Alias;
      $this->Changeable = $Changeable;
      $this->Index = $Index;
      $this->RequestedPassengerIndex = $RequestedPassengerIndex;
    }

    /**
     * @return TPA_Extensions
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerTypeQuantityType
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
      return $this->Alias;
    }

    /**
     * @param string $Alias
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerTypeQuantityType
     */
    public function setAlias($Alias)
    {
      $this->Alias = $Alias;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getChangeable()
    {
      return $this->Changeable;
    }

    /**
     * @param boolean $Changeable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerTypeQuantityType
     */
    public function setChangeable($Changeable)
    {
      $this->Changeable = $Changeable;
      return $this;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
      return $this->Index;
    }

    /**
     * @param int $Index
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerTypeQuantityType
     */
    public function setIndex($Index)
    {
      $this->Index = $Index;
      return $this;
    }

    /**
     * @return int
     */
    public function getRequestedPassengerIndex()
    {
      return $this->RequestedPassengerIndex;
    }

    /**
     * @param int $RequestedPassengerIndex
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PassengerTypeQuantityType
     */
    public function setRequestedPassengerIndex($RequestedPassengerIndex)
    {
      $this->RequestedPassengerIndex = $RequestedPassengerIndex;
      return $this;
    }

}
