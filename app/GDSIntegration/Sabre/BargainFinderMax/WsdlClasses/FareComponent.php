<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareComponent
{

    /**
     * @var CurrencyAmountType $BaseFare
     */
    protected $BaseFare = null;

    /**
     * @var EquivFare $EquivFare
     */
    protected $EquivFare = null;

    /**
     * @var Taxes $Taxes
     */
    protected $Taxes = null;

    /**
     * @var CurrencyAmountType $TotalFare
     */
    protected $TotalFare = null;

    /**
     * @var Segment $Segment
     */
    protected $Segment = null;

    /**
     * @var HandlingMarkupDetail $HandlingMarkupDetail
     */
    protected $HandlingMarkupDetail = null;

    /**
     * @var FareRetailerRule $FareRetailerRule
     */
    protected $FareRetailerRule = null;

    /**
     * @var BrandFeatureRefType $BrandFeatureRef
     */
    protected $BrandFeatureRef = null;

    /**
     * @var PointsRedemptionType $PointsRedemption
     */
    protected $PointsRedemption = null;

    /**
     * @var string $ProgramID
     */
    protected $ProgramID = null;

    /**
     * @var string $ProgramCode
     */
    protected $ProgramCode = null;

    /**
     * @var string $ProgramDescription
     */
    protected $ProgramDescription = null;

    /**
     * @var string $ProgramSystemCode
     */
    protected $ProgramSystemCode = null;

    /**
     * @var string $BrandID
     */
    protected $BrandID = null;

    /**
     * @var string $BrandName
     */
    protected $BrandName = null;

    /**
     * @param CurrencyAmountType $BaseFare
     * @param EquivFare $EquivFare
     * @param Taxes $Taxes
     * @param CurrencyAmountType $TotalFare
     * @param Segment $Segment
     * @param HandlingMarkupDetail $HandlingMarkupDetail
     * @param FareRetailerRule $FareRetailerRule
     * @param BrandFeatureRefType $BrandFeatureRef
     * @param PointsRedemptionType $PointsRedemption
     * @param string $ProgramID
     * @param string $ProgramCode
     * @param string $ProgramDescription
     * @param string $ProgramSystemCode
     * @param string $BrandID
     * @param string $BrandName
     */
    public function __construct($BaseFare = null, $EquivFare = null, $Taxes = null, $TotalFare = null, $Segment = null, $HandlingMarkupDetail = null, $FareRetailerRule = null, $BrandFeatureRef = null, $PointsRedemption = null, $ProgramID = null, $ProgramCode = null, $ProgramDescription = null, $ProgramSystemCode = null, $BrandID = null, $BrandName = null)
    {
      $this->BaseFare = $BaseFare;
      $this->EquivFare = $EquivFare;
      $this->Taxes = $Taxes;
      $this->TotalFare = $TotalFare;
      $this->Segment = $Segment;
      $this->HandlingMarkupDetail = $HandlingMarkupDetail;
      $this->FareRetailerRule = $FareRetailerRule;
      $this->BrandFeatureRef = $BrandFeatureRef;
      $this->PointsRedemption = $PointsRedemption;
      $this->ProgramID = $ProgramID;
      $this->ProgramCode = $ProgramCode;
      $this->ProgramDescription = $ProgramDescription;
      $this->ProgramSystemCode = $ProgramSystemCode;
      $this->BrandID = $BrandID;
      $this->BrandName = $BrandName;
    }

    /**
     * @return CurrencyAmountType
     */
    public function getBaseFare()
    {
      return $this->BaseFare;
    }

    /**
     * @param CurrencyAmountType $BaseFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setBaseFare($BaseFare)
    {
      $this->BaseFare = $BaseFare;
      return $this;
    }

    /**
     * @return EquivFare
     */
    public function getEquivFare()
    {
      return $this->EquivFare;
    }

    /**
     * @param EquivFare $EquivFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setEquivFare($EquivFare)
    {
      $this->EquivFare = $EquivFare;
      return $this;
    }

    /**
     * @return Taxes
     */
    public function getTaxes()
    {
      return $this->Taxes;
    }

    /**
     * @param Taxes $Taxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setTaxes($Taxes)
    {
      $this->Taxes = $Taxes;
      return $this;
    }

    /**
     * @return CurrencyAmountType
     */
    public function getTotalFare()
    {
      return $this->TotalFare;
    }

    /**
     * @param CurrencyAmountType $TotalFare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setTotalFare($TotalFare)
    {
      $this->TotalFare = $TotalFare;
      return $this;
    }

    /**
     * @return Segment
     */
    public function getSegment()
    {
      return $this->Segment;
    }

    /**
     * @param Segment $Segment
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setSegment($Segment)
    {
      $this->Segment = $Segment;
      return $this;
    }

    /**
     * @return HandlingMarkupDetail
     */
    public function getHandlingMarkupDetail()
    {
      return $this->HandlingMarkupDetail;
    }

    /**
     * @param HandlingMarkupDetail $HandlingMarkupDetail
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setHandlingMarkupDetail($HandlingMarkupDetail)
    {
      $this->HandlingMarkupDetail = $HandlingMarkupDetail;
      return $this;
    }

    /**
     * @return FareRetailerRule
     */
    public function getFareRetailerRule()
    {
      return $this->FareRetailerRule;
    }

    /**
     * @param FareRetailerRule $FareRetailerRule
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setFareRetailerRule($FareRetailerRule)
    {
      $this->FareRetailerRule = $FareRetailerRule;
      return $this;
    }

    /**
     * @return BrandFeatureRefType
     */
    public function getBrandFeatureRef()
    {
      return $this->BrandFeatureRef;
    }

    /**
     * @param BrandFeatureRefType $BrandFeatureRef
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setBrandFeatureRef($BrandFeatureRef)
    {
      $this->BrandFeatureRef = $BrandFeatureRef;
      return $this;
    }

    /**
     * @return PointsRedemptionType
     */
    public function getPointsRedemption()
    {
      return $this->PointsRedemption;
    }

    /**
     * @param PointsRedemptionType $PointsRedemption
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setPointsRedemption($PointsRedemption)
    {
      $this->PointsRedemption = $PointsRedemption;
      return $this;
    }

    /**
     * @return string
     */
    public function getProgramID()
    {
      return $this->ProgramID;
    }

    /**
     * @param string $ProgramID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setProgramID($ProgramID)
    {
      $this->ProgramID = $ProgramID;
      return $this;
    }

    /**
     * @return string
     */
    public function getProgramCode()
    {
      return $this->ProgramCode;
    }

    /**
     * @param string $ProgramCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setProgramCode($ProgramCode)
    {
      $this->ProgramCode = $ProgramCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getProgramDescription()
    {
      return $this->ProgramDescription;
    }

    /**
     * @param string $ProgramDescription
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setProgramDescription($ProgramDescription)
    {
      $this->ProgramDescription = $ProgramDescription;
      return $this;
    }

    /**
     * @return string
     */
    public function getProgramSystemCode()
    {
      return $this->ProgramSystemCode;
    }

    /**
     * @param string $ProgramSystemCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setProgramSystemCode($ProgramSystemCode)
    {
      $this->ProgramSystemCode = $ProgramSystemCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getBrandID()
    {
      return $this->BrandID;
    }

    /**
     * @param string $BrandID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setBrandID($BrandID)
    {
      $this->BrandID = $BrandID;
      return $this;
    }

    /**
     * @return string
     */
    public function getBrandName()
    {
      return $this->BrandName;
    }

    /**
     * @param string $BrandName
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareComponent
     */
    public function setBrandName($BrandName)
    {
      $this->BrandName = $BrandName;
      return $this;
    }

}
