<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class WarningType extends FreeTextType
{

    /**
     * @var FreeTextType $_
     */
    protected $_ = null;

    /**
     * @var OTA_CodeType $Type
     */
    protected $Type = null;

    /**
     * @var string $ShortText
     */
    protected $ShortText = null;

    /**
     * @var int $NumberOfOccurences
     */
    protected $NumberOfOccurences = null;

    /**
     * @var OTA_CodeType $Code
     */
    protected $Code = null;

    /**
     * @var anyURI $DocURL
     */
    protected $DocURL = null;

    /**
     * @var StringLength1to64 $Status
     */
    protected $Status = null;

    /**
     * @var string $Tag
     */
    protected $Tag = null;

    /**
     * @var StringLength1to32 $RecordID
     */
    protected $RecordID = null;

    /**
     * @var MessageClassType $MessageClass
     */
    protected $MessageClass = null;

    /**
     * @param string $_
     * @param language $Language
     * @param FreeTextType $_
     * @param OTA_CodeType $Type
     * @param string $ShortText
     * @param int $NumberOfOccurences
     * @param OTA_CodeType $Code
     * @param anyURI $DocURL
     * @param StringLength1to64 $Status
     * @param string $Tag
     * @param StringLength1to32 $RecordID
     * @param MessageClassType $MessageClass
     */
    public function __construct($_ = null, $Language = null, $Type = null, $ShortText = null, $NumberOfOccurences = null, $Code = null, $DocURL = null, $Status = null, $Tag = null, $RecordID = null, $MessageClass = null)
    {
      parent::__construct($_, $Language);
      $this->_ = $_;
      $this->Type = $Type;
      $this->ShortText = $ShortText;
      $this->NumberOfOccurences = $NumberOfOccurences;
      $this->Code = $Code;
      $this->DocURL = $DocURL;
      $this->Status = $Status;
      $this->Tag = $Tag;
      $this->RecordID = $RecordID;
      $this->MessageClass = $MessageClass;
    }

    /**
     * @return FreeTextType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param FreeTextType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function set_($_)
    {
      $this->_ = $_;
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
     * @param OTA_CodeType $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return string
     */
    public function getShortText()
    {
      return $this->ShortText;
    }

    /**
     * @param string $ShortText
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setShortText($ShortText)
    {
      $this->ShortText = $ShortText;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfOccurences()
    {
      return $this->NumberOfOccurences;
    }

    /**
     * @param int $NumberOfOccurences
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setNumberOfOccurences($NumberOfOccurences)
    {
      $this->NumberOfOccurences = $NumberOfOccurences;
      return $this;
    }

    /**
     * @return OTA_CodeType
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param OTA_CodeType $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getDocURL()
    {
      return $this->DocURL;
    }

    /**
     * @param anyURI $DocURL
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setDocURL($DocURL)
    {
      $this->DocURL = $DocURL;
      return $this;
    }

    /**
     * @return StringLength1to64
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param StringLength1to64 $Status
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
      return $this->Tag;
    }

    /**
     * @param string $Tag
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setTag($Tag)
    {
      $this->Tag = $Tag;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getRecordID()
    {
      return $this->RecordID;
    }

    /**
     * @param StringLength1to32 $RecordID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setRecordID($RecordID)
    {
      $this->RecordID = $RecordID;
      return $this;
    }

    /**
     * @return MessageClassType
     */
    public function getMessageClass()
    {
      return $this->MessageClass;
    }

    /**
     * @param MessageClassType $MessageClass
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningType
     */
    public function setMessageClass($MessageClass)
    {
      $this->MessageClass = $MessageClass;
      return $this;
    }

}
