<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternateDateLowestFaresType
{

    /**
     * @var string $DepartureDateTime
     */
    protected $DepartureDateTime = null;

    /**
     * @var string $ReturnlDateTime
     */
    protected $ReturnlDateTime = null;

    /**
     * @var CurrencyAmountType $LowestFare
     */
    protected $LowestFare = null;

    /**
     * @param string $DepartureDateTime
     * @param string $ReturnlDateTime
     * @param CurrencyAmountType $LowestFare
     */
    public function __construct($DepartureDateTime = null, $ReturnlDateTime = null, $LowestFare = null)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      $this->ReturnlDateTime = $ReturnlDateTime;
      $this->LowestFare = $LowestFare;
    }

    /**
     * @return string
     */
    public function getDepartureDateTime()
    {
      return $this->DepartureDateTime;
    }

    /**
     * @param string $DepartureDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateDateLowestFaresType
     */
    public function setDepartureDateTime($DepartureDateTime)
    {
      $this->DepartureDateTime = $DepartureDateTime;
      return $this;
    }

    /**
     * @return string
     */
    public function getReturnlDateTime()
    {
      return $this->ReturnlDateTime;
    }

    /**
     * @param string $ReturnlDateTime
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateDateLowestFaresType
     */
    public function setReturnlDateTime($ReturnlDateTime)
    {
      $this->ReturnlDateTime = $ReturnlDateTime;
      return $this;
    }

    /**
     * @return CurrencyAmountType
     */
    public function getLowestFare()
    {
      return $this->LowestFare;
    }

    /**
     * @param CurrencyAmountType $LowestFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateDateLowestFaresType
     */
    public function setLowestFare($LowestFare)
    {
      $this->LowestFare = $LowestFare;
      return $this;
    }

}
