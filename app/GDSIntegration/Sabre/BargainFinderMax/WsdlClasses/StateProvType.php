<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StateProvType
{

    /**
     * @var StringLength0to64 $_
     */
    protected $_ = null;

    /**
     * @var anonymous321 $StateCode
     */
    protected $StateCode = null;

    /**
     * @param StringLength0to64 $_
     * @param anonymous321 $StateCode
     */
    public function __construct($_ = null, $StateCode = null)
    {
      $this->_ = $_;
      $this->StateCode = $StateCode;
    }

    /**
     * @return StringLength0to64
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param StringLength0to64 $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StateProvType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return anonymous321
     */
    public function getStateCode()
    {
      return $this->StateCode;
    }

    /**
     * @param anonymous321 $StateCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StateProvType
     */
    public function setStateCode($StateCode)
    {
      $this->StateCode = $StateCode;
      return $this;
    }

}
