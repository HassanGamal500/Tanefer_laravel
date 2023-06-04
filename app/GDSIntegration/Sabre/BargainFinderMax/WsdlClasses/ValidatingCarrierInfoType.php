<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ValidatingCarrierInfoType
{

    /**
     * @var CarrierCountriesType $Default
     */
    protected $Default = null;

    /**
     * @var CarrierCountriesType[] $Alternate
     */
    protected $Alternate = null;

    /**
     * @var CarrierCountriesType[] $OtherTicketing
     */
    protected $OtherTicketing = null;

    /**
     * @var StringLength3 $SettlementMethod
     */
    protected $SettlementMethod = null;

    /**
     * @var ISO3166 $Country
     */
    protected $Country = null;

    /**
     * @var boolean $NewVcxProcess
     */
    protected $NewVcxProcess = null;

    /**
     * @param StringLength3 $SettlementMethod
     * @param ISO3166 $Country
     * @param boolean $NewVcxProcess
     */
    public function __construct($SettlementMethod = null, $Country = null, $NewVcxProcess = null)
    {
      $this->SettlementMethod = $SettlementMethod;
      $this->Country = $Country;
      $this->NewVcxProcess = $NewVcxProcess;
    }

    /**
     * @return CarrierCountriesType
     */
    public function getDefault()
    {
      return $this->Default;
    }

    /**
     * @param CarrierCountriesType $Default
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierInfoType
     */
    public function setDefault($Default)
    {
      $this->Default = $Default;
      return $this;
    }

    /**
     * @return CarrierCountriesType[]
     */
    public function getAlternate()
    {
      return $this->Alternate;
    }

    /**
     * @param CarrierCountriesType[] $Alternate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierInfoType
     */
    public function setAlternate(array $Alternate = null)
    {
      $this->Alternate = $Alternate;
      return $this;
    }

    /**
     * @return CarrierCountriesType[]
     */
    public function getOtherTicketing()
    {
      return $this->OtherTicketing;
    }

    /**
     * @param CarrierCountriesType[] $OtherTicketing
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierInfoType
     */
    public function setOtherTicketing(array $OtherTicketing = null)
    {
      $this->OtherTicketing = $OtherTicketing;
      return $this;
    }

    /**
     * @return StringLength3
     */
    public function getSettlementMethod()
    {
      return $this->SettlementMethod;
    }

    /**
     * @param StringLength3 $SettlementMethod
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierInfoType
     */
    public function setSettlementMethod($SettlementMethod)
    {
      $this->SettlementMethod = $SettlementMethod;
      return $this;
    }

    /**
     * @return ISO3166
     */
    public function getCountry()
    {
      return $this->Country;
    }

    /**
     * @param ISO3166 $Country
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierInfoType
     */
    public function setCountry($Country)
    {
      $this->Country = $Country;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getNewVcxProcess()
    {
      return $this->NewVcxProcess;
    }

    /**
     * @param boolean $NewVcxProcess
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierInfoType
     */
    public function setNewVcxProcess($NewVcxProcess)
    {
      $this->NewVcxProcess = $NewVcxProcess;
      return $this;
    }

}
