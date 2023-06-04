<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class KeyInfoType
{

    /**
     * @var string $KeyName
     */
    protected $KeyName = null;

    /**
     * @var KeyValueType $KeyValue
     */
    protected $KeyValue = null;

    /**
     * @var RetrievalMethodType $RetrievalMethod
     */
    protected $RetrievalMethod = null;

    /**
     * @var X509DataType $X509Data
     */
    protected $X509Data = null;

    /**
     * @var PGPDataType $PGPData
     */
    protected $PGPData = null;

    /**
     * @var SPKIDataType $SPKIData
     */
    protected $SPKIData = null;

    /**
     * @var string $MgmtData
     */
    protected $MgmtData = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var ID $Id
     */
    protected $Id = null;

    /**
     * @param string $KeyName
     * @param KeyValueType $KeyValue
     * @param RetrievalMethodType $RetrievalMethod
     * @param X509DataType $X509Data
     * @param PGPDataType $PGPData
     * @param SPKIDataType $SPKIData
     * @param string $MgmtData
     * @param string $any
     * @param ID $Id
     */
    public function __construct($KeyName = null, $KeyValue = null, $RetrievalMethod = null, $X509Data = null, $PGPData = null, $SPKIData = null, $MgmtData = null, $any = null, $Id = null)
    {
      $this->KeyName = $KeyName;
      $this->KeyValue = $KeyValue;
      $this->RetrievalMethod = $RetrievalMethod;
      $this->X509Data = $X509Data;
      $this->PGPData = $PGPData;
      $this->SPKIData = $SPKIData;
      $this->MgmtData = $MgmtData;
      $this->any = $any;
      $this->Id = $Id;
    }

    /**
     * @return string
     */
    public function getKeyName()
    {
      return $this->KeyName;
    }

    /**
     * @param string $KeyName
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setKeyName($KeyName)
    {
      $this->KeyName = $KeyName;
      return $this;
    }

    /**
     * @return KeyValueType
     */
    public function getKeyValue()
    {
      return $this->KeyValue;
    }

    /**
     * @param KeyValueType $KeyValue
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setKeyValue($KeyValue)
    {
      $this->KeyValue = $KeyValue;
      return $this;
    }

    /**
     * @return RetrievalMethodType
     */
    public function getRetrievalMethod()
    {
      return $this->RetrievalMethod;
    }

    /**
     * @param RetrievalMethodType $RetrievalMethod
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setRetrievalMethod($RetrievalMethod)
    {
      $this->RetrievalMethod = $RetrievalMethod;
      return $this;
    }

    /**
     * @return X509DataType
     */
    public function getX509Data()
    {
      return $this->X509Data;
    }

    /**
     * @param X509DataType $X509Data
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setX509Data($X509Data)
    {
      $this->X509Data = $X509Data;
      return $this;
    }

    /**
     * @return PGPDataType
     */
    public function getPGPData()
    {
      return $this->PGPData;
    }

    /**
     * @param PGPDataType $PGPData
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setPGPData($PGPData)
    {
      $this->PGPData = $PGPData;
      return $this;
    }

    /**
     * @return SPKIDataType
     */
    public function getSPKIData()
    {
      return $this->SPKIData;
    }

    /**
     * @param SPKIDataType $SPKIData
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setSPKIData($SPKIData)
    {
      $this->SPKIData = $SPKIData;
      return $this;
    }

    /**
     * @return string
     */
    public function getMgmtData()
    {
      return $this->MgmtData;
    }

    /**
     * @param string $MgmtData
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setMgmtData($MgmtData)
    {
      $this->MgmtData = $MgmtData;
      return $this;
    }

    /**
     * @return string
     */
    public function getAny()
    {
      return $this->any;
    }

    /**
     * @param string $any
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return ID
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param ID $Id
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\KeyInfoType
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
