<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ShelfDefinitionType
{

    /**
     * @var int $Id
     */
    protected $Id = null;

    /**
     * @var SeatComfortType $SeatComfort
     */
    protected $SeatComfort = null;

    /**
     * @var string $Cabin
     */
    protected $Cabin = null;

    /**
     * @var boolean $Exchanges
     */
    protected $Exchanges = null;

    /**
     * @var boolean $Refunds
     */
    protected $Refunds = null;

    /**
     * @var boolean $FreeBaggageIncluded
     */
    protected $FreeBaggageIncluded = null;

    /**
     * @param int $Id
     * @param SeatComfortType $SeatComfort
     * @param string $Cabin
     * @param boolean $Exchanges
     * @param boolean $Refunds
     * @param boolean $FreeBaggageIncluded
     */
    public function __construct($Id = null, $SeatComfort = null, $Cabin = null, $Exchanges = null, $Refunds = null, $FreeBaggageIncluded = null)
    {
      $this->Id = $Id;
      $this->SeatComfort = $SeatComfort;
      $this->Cabin = $Cabin;
      $this->Exchanges = $Exchanges;
      $this->Refunds = $Refunds;
      $this->FreeBaggageIncluded = $FreeBaggageIncluded;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelfDefinitionType
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return SeatComfortType
     */
    public function getSeatComfort()
    {
      return $this->SeatComfort;
    }

    /**
     * @param SeatComfortType $SeatComfort
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelfDefinitionType
     */
    public function setSeatComfort($SeatComfort)
    {
      $this->SeatComfort = $SeatComfort;
      return $this;
    }

    /**
     * @return string
     */
    public function getCabin()
    {
      return $this->Cabin;
    }

    /**
     * @param string $Cabin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelfDefinitionType
     */
    public function setCabin($Cabin)
    {
      $this->Cabin = $Cabin;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getExchanges()
    {
      return $this->Exchanges;
    }

    /**
     * @param boolean $Exchanges
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelfDefinitionType
     */
    public function setExchanges($Exchanges)
    {
      $this->Exchanges = $Exchanges;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getRefunds()
    {
      return $this->Refunds;
    }

    /**
     * @param boolean $Refunds
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelfDefinitionType
     */
    public function setRefunds($Refunds)
    {
      $this->Refunds = $Refunds;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getFreeBaggageIncluded()
    {
      return $this->FreeBaggageIncluded;
    }

    /**
     * @param boolean $FreeBaggageIncluded
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ShelfDefinitionType
     */
    public function setFreeBaggageIncluded($FreeBaggageIncluded)
    {
      $this->FreeBaggageIncluded = $FreeBaggageIncluded;
      return $this;
    }

}
