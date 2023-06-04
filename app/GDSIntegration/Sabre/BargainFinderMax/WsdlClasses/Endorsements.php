<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Endorsements
{

    /**
     * @var Endorsement $Endorsement
     */
    protected $Endorsement = null;

    /**
     * @var string $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var boolean $NonRefundableIndicator
     */
    protected $NonRefundableIndicator = null;

    /**
     * @var boolean $NonEndorsableIndicator
     */
    protected $NonEndorsableIndicator = null;

    /**
     * @param Endorsement $Endorsement
     * @param string $TPA_Extensions
     * @param boolean $NonRefundableIndicator
     * @param boolean $NonEndorsableIndicator
     */
    public function __construct($Endorsement = null, $TPA_Extensions = null, $NonRefundableIndicator = null, $NonEndorsableIndicator = null)
    {
      $this->Endorsement = $Endorsement;
      $this->TPA_Extensions = $TPA_Extensions;
      $this->NonRefundableIndicator = $NonRefundableIndicator;
      $this->NonEndorsableIndicator = $NonEndorsableIndicator;
    }

    /**
     * @return Endorsement
     */
    public function getEndorsement()
    {
      return $this->Endorsement;
    }

    /**
     * @param Endorsement $Endorsement
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Endorsements
     */
    public function setEndorsement($Endorsement)
    {
      $this->Endorsement = $Endorsement;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Endorsements
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getNonRefundableIndicator()
    {
      return $this->NonRefundableIndicator;
    }

    /**
     * @param boolean $NonRefundableIndicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Endorsements
     */
    public function setNonRefundableIndicator($NonRefundableIndicator)
    {
      $this->NonRefundableIndicator = $NonRefundableIndicator;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getNonEndorsableIndicator()
    {
      return $this->NonEndorsableIndicator;
    }

    /**
     * @param boolean $NonEndorsableIndicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Endorsements
     */
    public function setNonEndorsableIndicator($NonEndorsableIndicator)
    {
      $this->NonEndorsableIndicator = $NonEndorsableIndicator;
      return $this;
    }

}
