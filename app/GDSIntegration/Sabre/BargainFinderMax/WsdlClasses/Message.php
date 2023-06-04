<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Message
{

    /**
     * @var StringLength1to8 $AirlineCode
     */
    protected $AirlineCode = null;

    /**
     * @var CharacterType $Type
     */
    protected $Type = null;

    /**
     * @var int $FailCode
     */
    protected $FailCode = null;

    /**
     * @var string $Info
     */
    protected $Info = null;

    /**
     * @param StringLength1to8 $AirlineCode
     * @param CharacterType $Type
     * @param int $FailCode
     * @param string $Info
     */
    public function __construct($AirlineCode = null, $Type = null, $FailCode = null, $Info = null)
    {
      $this->AirlineCode = $AirlineCode;
      $this->Type = $Type;
      $this->FailCode = $FailCode;
      $this->Info = $Info;
    }

    /**
     * @return StringLength1to8
     */
    public function getAirlineCode()
    {
      return $this->AirlineCode;
    }

    /**
     * @param StringLength1to8 $AirlineCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Message
     */
    public function setAirlineCode($AirlineCode)
    {
      $this->AirlineCode = $AirlineCode;
      return $this;
    }

    /**
     * @return CharacterType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param CharacterType $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Message
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return int
     */
    public function getFailCode()
    {
      return $this->FailCode;
    }

    /**
     * @param int $FailCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Message
     */
    public function setFailCode($FailCode)
    {
      $this->FailCode = $FailCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
      return $this->Info;
    }

    /**
     * @param string $Info
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Message
     */
    public function setInfo($Info)
    {
      $this->Info = $Info;
      return $this;
    }

}
