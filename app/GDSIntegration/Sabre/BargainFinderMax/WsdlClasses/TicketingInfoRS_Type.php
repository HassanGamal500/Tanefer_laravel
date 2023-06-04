<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TicketingInfoRS_Type
{

    /**
     * @var FreeTextType[] $TicketAdvisory
     */
    protected $TicketAdvisory = null;

    /**
     * @var string $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var AlphaNumericStringLength1to14 $eTicketNumber
     */
    protected $eTicketNumber = null;

    /**
     * @var string $TicketTimeLimit
     */
    protected $TicketTimeLimit = null;

    /**
     * @var TicketType $TicketType
     */
    protected $TicketType = null;

    /**
     * @var ValidInterlineType $ValidInterline
     */
    protected $ValidInterline = null;

    /**
     * @param AlphaNumericStringLength1to14 $eTicketNumber
     * @param string $TicketTimeLimit
     * @param TicketType $TicketType
     * @param ValidInterlineType $ValidInterline
     */
    public function __construct($eTicketNumber = null, $TicketTimeLimit = null, $TicketType = null, $ValidInterline = null)
    {
      $this->eTicketNumber = $eTicketNumber;
      $this->TicketTimeLimit = $TicketTimeLimit;
      $this->TicketType = $TicketType;
      $this->ValidInterline = $ValidInterline;
    }

    /**
     * @return FreeTextType[]
     */
    public function getTicketAdvisory()
    {
      return $this->TicketAdvisory;
    }

    /**
     * @param FreeTextType[] $TicketAdvisory
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketingInfoRS_Type
     */
    public function setTicketAdvisory(array $TicketAdvisory = null)
    {
      $this->TicketAdvisory = $TicketAdvisory;
      return $this;
    }

    /**
     * @return string
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param string $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketingInfoRS_Type
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return AlphaNumericStringLength1to14
     */
    public function getETicketNumber()
    {
      return $this->eTicketNumber;
    }

    /**
     * @param AlphaNumericStringLength1to14 $eTicketNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketingInfoRS_Type
     */
    public function setETicketNumber($eTicketNumber)
    {
      $this->eTicketNumber = $eTicketNumber;
      return $this;
    }

    /**
     * @return string
     */
    public function getTicketTimeLimit()
    {
      return $this->TicketTimeLimit;
    }

    /**
     * @param string $TicketTimeLimit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketingInfoRS_Type
     */
    public function setTicketTimeLimit($TicketTimeLimit)
    {
      $this->TicketTimeLimit = $TicketTimeLimit;
      return $this;
    }

    /**
     * @return TicketType
     */
    public function getTicketType()
    {
      return $this->TicketType;
    }

    /**
     * @param TicketType $TicketType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketingInfoRS_Type
     */
    public function setTicketType($TicketType)
    {
      $this->TicketType = $TicketType;
      return $this;
    }

    /**
     * @return ValidInterlineType
     */
    public function getValidInterline()
    {
      return $this->ValidInterline;
    }

    /**
     * @param ValidInterlineType $ValidInterline
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketingInfoRS_Type
     */
    public function setValidInterline($ValidInterline)
    {
      $this->ValidInterline = $ValidInterline;
      return $this;
    }

}
