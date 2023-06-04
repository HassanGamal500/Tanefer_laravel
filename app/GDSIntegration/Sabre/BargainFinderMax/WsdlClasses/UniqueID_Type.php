<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class UniqueID_Type
{

    /**
     * @var CompanyNameType $CompanyName
     */
    protected $CompanyName = null;

    /**
     * @var anyURI $URL
     */
    protected $URL = null;

    /**
     * @var OTA_CodeType $Type
     */
    protected $Type = null;

    /**
     * @var StringLength1to32 $Instance
     */
    protected $Instance = null;

    /**
     * @var StringLength1to32 $ID_Context
     */
    protected $ID_Context = null;

    /**
     * @var StringLength1to32 $ID
     */
    protected $ID = null;

    /**
     * @param anyURI $URL
     * @param OTA_CodeType $Type
     * @param StringLength1to32 $Instance
     * @param StringLength1to32 $ID_Context
     * @param StringLength1to32 $ID
     */
    public function __construct($URL = null, $Type = null, $Instance = null, $ID_Context = null, $ID = null)
    {
      $this->URL = $URL;
      $this->Type = $Type;
      $this->Instance = $Instance;
      $this->ID_Context = $ID_Context;
      $this->ID = $ID;
    }

    /**
     * @return CompanyNameType
     */
    public function getCompanyName()
    {
      return $this->CompanyName;
    }

    /**
     * @param CompanyNameType $CompanyName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UniqueID_Type
     */
    public function setCompanyName($CompanyName)
    {
      $this->CompanyName = $CompanyName;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getURL()
    {
      return $this->URL;
    }

    /**
     * @param anyURI $URL
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UniqueID_Type
     */
    public function setURL($URL)
    {
      $this->URL = $URL;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param string $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UniqueID_Type
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getInstance()
    {
      return $this->Instance;
    }

    /**
     * @param StringLength1to32 $Instance
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UniqueID_Type
     */
    public function setInstance($Instance)
    {
      $this->Instance = $Instance;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getID_Context()
    {
      return $this->ID_Context;
    }

    /**
     * @param StringLength1to32 $ID_Context
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UniqueID_Type
     */
    public function setID_Context($ID_Context)
    {
      $this->ID_Context = $ID_Context;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getID()
    {
      return $this->ID;
    }

    /**
     * @param string $ID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\UniqueID_Type
     */
    public function setID($ID)
    {
      $this->ID = $ID;
      return $this;
    }

}
