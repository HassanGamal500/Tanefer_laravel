<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ExchangeSettingsType
{

    /**
     * @var boolean $RepriceCurrentItin
     */
    protected $RepriceCurrentItin = null;

    /**
     * @var boolean $AttachExchangeInfo
     */
    protected $AttachExchangeInfo = null;

    /**
     * @var anonymous471 $ReissueExchange
     */
    protected $ReissueExchange = null;

    /**
     * @var boolean $BrandedResults
     */
    protected $BrandedResults = null;

    /**
     * @var int $MIPTimeoutThreshold
     */
    protected $MIPTimeoutThreshold = null;

    /**
     * @var anonymous472 $RequestType
     */
    protected $RequestType = null;

    /**
     * @param boolean $RepriceCurrentItin
     * @param boolean $AttachExchangeInfo
     * @param anonymous471 $ReissueExchange
     * @param boolean $BrandedResults
     * @param int $MIPTimeoutThreshold
     * @param anonymous472 $RequestType
     */
    public function __construct($RepriceCurrentItin = null, $AttachExchangeInfo = null, $ReissueExchange = null, $BrandedResults = null, $MIPTimeoutThreshold = null, $RequestType = null)
    {
      $this->RepriceCurrentItin = $RepriceCurrentItin;
      $this->AttachExchangeInfo = $AttachExchangeInfo;
      $this->ReissueExchange = $ReissueExchange;
      $this->BrandedResults = $BrandedResults;
      $this->MIPTimeoutThreshold = $MIPTimeoutThreshold;
      $this->RequestType = $RequestType;
    }

    /**
     * @return boolean
     */
    public function getRepriceCurrentItin()
    {
      return $this->RepriceCurrentItin;
    }

    /**
     * @param boolean $RepriceCurrentItin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeSettingsType
     */
    public function setRepriceCurrentItin($RepriceCurrentItin)
    {
      $this->RepriceCurrentItin = $RepriceCurrentItin;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAttachExchangeInfo()
    {
      return $this->AttachExchangeInfo;
    }

    /**
     * @param boolean $AttachExchangeInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeSettingsType
     */
    public function setAttachExchangeInfo($AttachExchangeInfo)
    {
      $this->AttachExchangeInfo = $AttachExchangeInfo;
      return $this;
    }

    /**
     * @return anonymous471
     */
    public function getReissueExchange()
    {
      return $this->ReissueExchange;
    }

    /**
     * @param anonymous471 $ReissueExchange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeSettingsType
     */
    public function setReissueExchange($ReissueExchange)
    {
      $this->ReissueExchange = $ReissueExchange;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getBrandedResults()
    {
      return $this->BrandedResults;
    }

    /**
     * @param boolean $BrandedResults
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeSettingsType
     */
    public function setBrandedResults($BrandedResults)
    {
      $this->BrandedResults = $BrandedResults;
      return $this;
    }

    /**
     * @return int
     */
    public function getMIPTimeoutThreshold()
    {
      return $this->MIPTimeoutThreshold;
    }

    /**
     * @param int $MIPTimeoutThreshold
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeSettingsType
     */
    public function setMIPTimeoutThreshold($MIPTimeoutThreshold)
    {
      $this->MIPTimeoutThreshold = $MIPTimeoutThreshold;
      return $this;
    }

    /**
     * @return anonymous472
     */
    public function getRequestType()
    {
      return $this->RequestType;
    }

    /**
     * @param anonymous472 $RequestType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ExchangeSettingsType
     */
    public function setRequestType($RequestType)
    {
      $this->RequestType = $RequestType;
      return $this;
    }

}
