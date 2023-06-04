<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ResponseLocationType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var StringLength1to8 $LocationCode
     */
    protected $LocationCode = null;

    /**
     * @var StringLength1to32 $CodeContext
     */
    protected $CodeContext = null;

    /**
     * @param string $_
     * @param StringLength1to8 $LocationCode
     * @param StringLength1to32 $CodeContext
     */
    public function __construct($_ = null, $LocationCode = null, $CodeContext = null)
    {
      $this->_ = $_;
      $this->LocationCode = $LocationCode;
      $this->CodeContext = $CodeContext;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResponseLocationType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return StringLength1to8
     */
    public function getLocationCode()
    {
      return $this->LocationCode;
    }

    /**
     * @param StringLength1to8 $LocationCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResponseLocationType
     */
    public function setLocationCode($LocationCode)
    {
      $this->LocationCode = $LocationCode;
      return $this;
    }

    /**
     * @return StringLength1to32
     */
    public function getCodeContext()
    {
      return $this->CodeContext;
    }

    /**
     * @param StringLength1to32 $CodeContext
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResponseLocationType
     */
    public function setCodeContext($CodeContext)
    {
      $this->CodeContext = $CodeContext;
      return $this;
    }

}
