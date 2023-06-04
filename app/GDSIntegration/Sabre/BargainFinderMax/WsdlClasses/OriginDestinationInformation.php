<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OriginDestinationInformation extends OriginDestinationInformationType
{

    /**
     * @var TPA_Extensions $TPA_Extensions
     */
    protected $TPA_Extensions = null;

    /**
     * @var RPH_Type $RPH
     */
    protected $RPH = null;

    /**
     * @var boolean $Fixed
     */
    protected $Fixed = null;

    /**
     * @var boolean $FullDiversity
     */
    protected $FullDiversity = null;

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @param RPH_Type $RPH
     * @param boolean $Fixed
     * @param boolean $FullDiversity
     */
    public function __construct($TPA_Extensions = null, $RPH = null, $Fixed = null, $FullDiversity = null)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      $this->RPH = $RPH;
      $this->Fixed = $Fixed;
      $this->FullDiversity = $FullDiversity;
    }

    /**
     * @return TPA_Extensions
     */
    public function getTPA_Extensions()
    {
      return $this->TPA_Extensions;
    }

    /**
     * @param TPA_Extensions $TPA_Extensions
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformation
     */
    public function setTPA_Extensions($TPA_Extensions)
    {
      $this->TPA_Extensions = $TPA_Extensions;
      return $this;
    }

    /**
     * @return RPH_Type
     */
    public function getRPH()
    {
      return $this->RPH;
    }

    /**
     * @param string $RPH
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformation
     */
    public function setRPH($RPH)
    {
      $this->RPH = $RPH;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getFixed()
    {
      return $this->Fixed;
    }

    /**
     * @param boolean $Fixed
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformation
     */
    public function setFixed($Fixed)
    {
      $this->Fixed = $Fixed;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getFullDiversity()
    {
      return $this->FullDiversity;
    }

    /**
     * @param boolean $FullDiversity
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OriginDestinationInformation
     */
    public function setFullDiversity($FullDiversity)
    {
      $this->FullDiversity = $FullDiversity;
      return $this;
    }

}
