<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SurchargesType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var string $Ind
     */
    protected $Ind = null;

    /**
     * @var string $Type
     */
    protected $Type = null;

    /**
     * @var CurrencyCodeType $CurrencyCode
     */
    protected $CurrencyCode = null;

    /**
     * @param string $_
     * @param string $Ind
     * @param string $Type
     * @param CurrencyCodeType $CurrencyCode
     */
    public function __construct($_ = null, $Ind = null, $Type = null, $CurrencyCode = null)
    {
      $this->_ = $_;
      $this->Ind = $Ind;
      $this->Type = $Type;
      $this->CurrencyCode = $CurrencyCode;
    }

    /**
     * @return string
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param string $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SurchargesType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return string
     */
    public function getInd()
    {
      return $this->Ind;
    }

    /**
     * @param string $Ind
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SurchargesType
     */
    public function setInd($Ind)
    {
      $this->Ind = $Ind;
      return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param string $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SurchargesType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getCurrencyCode()
    {
      return $this->CurrencyCode;
    }

    /**
     * @param CurrencyCodeType $CurrencyCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SurchargesType
     */
    public function setCurrencyCode($CurrencyCode)
    {
      $this->CurrencyCode = $CurrencyCode;
      return $this;
    }

}
