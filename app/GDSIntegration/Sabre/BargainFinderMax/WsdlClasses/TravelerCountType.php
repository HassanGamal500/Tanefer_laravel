<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelerCountType
{

    /**
     * @var Numeric0to999 $ID
     */
    protected $ID = null;

    /**
     * @var Numeric0to999 $Age
     */
    protected $Age = null;

    /**
     * @var PassengerCodeType $Code
     */
    protected $Code = null;

    /**
     * @var StringLength1to32 $CodeContext
     */
    protected $CodeContext = null;

    /**
     * @var anyURI $URI
     */
    protected $URI = null;

    /**
     * @var Numeric1to999 $Quantity
     */
    protected $Quantity = null;

    /**
     * @param Numeric0to999 $ID
     * @param Numeric0to999 $Age
     * @param PassengerCodeType $Code
     * @param StringLength1to32 $CodeContext
     * @param anyURI $URI
     * @param Numeric1to999 $Quantity
     */
    public function __construct($ID = null, $Age = null, $Code = null, $CodeContext = null, $URI = null, $Quantity = null)
    {
      $this->ID = $ID;
      $this->Age = $Age;
      $this->Code = $Code;
      $this->CodeContext = $CodeContext;
      $this->URI = $URI;
      $this->Quantity = $Quantity;
    }

    /**
     * @return Numeric0to999
     */
    public function getID()
    {
      return $this->ID;
    }

    /**
     * @param Numeric0to999 $ID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerCountType
     */
    public function setID($ID)
    {
      $this->ID = $ID;
      return $this;
    }

    /**
     * @return Numeric0to999
     */
    public function getAge()
    {
      return $this->Age;
    }

    /**
     * @param Numeric0to999 $Age
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerCountType
     */
    public function setAge($Age)
    {
      $this->Age = $Age;
      return $this;
    }

    /**
     * @return PassengerCodeType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param string $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerCountType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getCodeContext()
    {
      return $this->CodeContext;
    }

    /**
     * @param StringLength1to32 $CodeContext
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerCountType
     */
    public function setCodeContext($CodeContext)
    {
      $this->CodeContext = $CodeContext;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getURI()
    {
      return $this->URI;
    }

    /**
     * @param anyURI $URI
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerCountType
     */
    public function setURI($URI)
    {
      $this->URI = $URI;
      return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
      return $this->Quantity;
    }

    /**
     * @param int $Quantity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerCountType
     */
    public function setQuantity($Quantity)
    {
      $this->Quantity = $Quantity;
      return $this;
    }

}
