<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Carrier
{

    /**
     * @var DefaultCustom $Default
     */
    protected $Default = null;

    /**
     * @var Override $Override
     */
    protected $Override = null;

    /**
     * @var SumWeight $Weight
     */
    protected $Weight = null;

    /**
     * @var boolean $OnlineIndicator
     */
    protected $OnlineIndicator = null;

    /**
     * @param DefaultCustom $Default
     * @param Override $Override
     * @param SumWeight $Weight
     * @param boolean $OnlineIndicator
     */
    public function __construct($Default = null, $Override = null, $Weight = null, $OnlineIndicator = null)
    {
      $this->Default = $Default;
      $this->Override = $Override;
      $this->Weight = $Weight;
      $this->OnlineIndicator = $OnlineIndicator;
    }

    /**
     * @return DefaultCustom
     */
    public function getDefault()
    {
      return $this->Default;
    }

    /**
     * @param DefaultCustom $Default
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Carrier
     */
    public function setDefault($Default)
    {
      $this->Default = $Default;
      return $this;
    }

    /**
     * @return Override
     */
    public function getOverride()
    {
      return $this->Override;
    }

    /**
     * @param Override $Override
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Carrier
     */
    public function setOverride($Override)
    {
      $this->Override = $Override;
      return $this;
    }

    /**
     * @return SumWeight
     */
    public function getWeight()
    {
      return $this->Weight;
    }

    /**
     * @param SumWeight $Weight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Carrier
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getOnlineIndicator()
    {
      return $this->OnlineIndicator;
    }

    /**
     * @param boolean $OnlineIndicator
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Carrier
     */
    public function setOnlineIndicator($OnlineIndicator)
    {
      $this->OnlineIndicator = $OnlineIndicator;
      return $this;
    }

}
