<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BookingChannelType
{

    /**
     * @var OTA_CodeType $Type
     */
    protected $Type = null;

    /**
     * @var boolean $Primary
     */
    protected $Primary = null;

    /**
     * @param OTA_CodeType $Type
     * @param boolean $Primary
     */
    public function __construct($Type = null, $Primary = null)
    {
      $this->Type = $Type;
      $this->Primary = $Primary;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookingChannelType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getPrimary()
    {
      return $this->Primary;
    }

    /**
     * @param boolean $Primary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookingChannelType
     */
    public function setPrimary($Primary)
    {
      $this->Primary = $Primary;
      return $this;
    }

}
