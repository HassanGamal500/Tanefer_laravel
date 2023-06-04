<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AncillaryFees
{

    /**
     * @var AncillaryFeeGroup $AncillaryFeeGroup
     */
    protected $AncillaryFeeGroup = null;

    /**
     * @var boolean $Enable
     */
    protected $Enable = null;

    /**
     * @var boolean $Summary
     */
    protected $Summary = null;

    /**
     * @param AncillaryFeeGroup $AncillaryFeeGroup
     * @param boolean $Enable
     * @param boolean $Summary
     */
    public function __construct($AncillaryFeeGroup = null, $Enable = null, $Summary = null)
    {
      $this->AncillaryFeeGroup = $AncillaryFeeGroup;
      $this->Enable = $Enable;
      $this->Summary = $Summary;
    }

    /**
     * @return AncillaryFeeGroup
     */
    public function getAncillaryFeeGroup()
    {
      return $this->AncillaryFeeGroup;
    }

    /**
     * @param AncillaryFeeGroup $AncillaryFeeGroup
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFees
     */
    public function setAncillaryFeeGroup($AncillaryFeeGroup)
    {
      $this->AncillaryFeeGroup = $AncillaryFeeGroup;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getEnable()
    {
      return $this->Enable;
    }

    /**
     * @param boolean $Enable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFees
     */
    public function setEnable($Enable)
    {
      $this->Enable = $Enable;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getSummary()
    {
      return $this->Summary;
    }

    /**
     * @param boolean $Summary
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AncillaryFees
     */
    public function setSummary($Summary)
    {
      $this->Summary = $Summary;
      return $this;
    }

}
