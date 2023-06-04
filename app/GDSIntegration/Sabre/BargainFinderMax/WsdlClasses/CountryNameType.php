<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CountryNameType
{

    /**
     * @var StringLength0to64 $_
     */
    protected $_ = null;

    /**
     * @var ISO3166 $Code
     */
    protected $Code = null;

    /**
     * @param StringLength0to64 $_
     * @param ISO3166 $Code
     */
    public function __construct($_ = null, $Code = null)
    {
      $this->_ = $_;
      $this->Code = $Code;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CountryNameType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return ISO3166
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param ISO3166 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CountryNameType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
