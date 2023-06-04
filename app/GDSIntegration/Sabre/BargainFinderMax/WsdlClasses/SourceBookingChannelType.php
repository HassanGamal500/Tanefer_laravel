<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SourceBookingChannelType extends BookingChannelType
{

    /**
     * @var CompanyNameType $CompanyName
     */
    protected $CompanyName = null;

    /**
     * @param OTA_CodeType $Type
     * @param boolean $Primary
     */
    public function __construct($Type = null, $Primary = null)
    {
      parent::__construct($Type, $Primary);
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SourceBookingChannelType
     */
    public function setCompanyName($CompanyName)
    {
      $this->CompanyName = $CompanyName;
      return $this;
    }

}
