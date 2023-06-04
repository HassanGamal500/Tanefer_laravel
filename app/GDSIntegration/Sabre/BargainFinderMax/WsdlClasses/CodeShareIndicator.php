<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CodeShareIndicator
{

    /**
     * @var boolean $ExcludeCodeshare
     */
    protected $ExcludeCodeshare = null;

    /**
     * @var boolean $KeepOnlines
     */
    protected $KeepOnlines = null;

    /**
     * @param boolean $ExcludeCodeshare
     * @param boolean $KeepOnlines
     */
    public function __construct($ExcludeCodeshare = null, $KeepOnlines = null)
    {
      $this->ExcludeCodeshare = $ExcludeCodeshare;
      $this->KeepOnlines = $KeepOnlines;
    }

    /**
     * @return boolean
     */
    public function getExcludeCodeshare()
    {
      return $this->ExcludeCodeshare;
    }

    /**
     * @param boolean $ExcludeCodeshare
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CodeShareIndicator
     */
    public function setExcludeCodeshare($ExcludeCodeshare)
    {
      $this->ExcludeCodeshare = $ExcludeCodeshare;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getKeepOnlines()
    {
      return $this->KeepOnlines;
    }

    /**
     * @param boolean $KeepOnlines
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CodeShareIndicator
     */
    public function setKeepOnlines($KeepOnlines)
    {
      $this->KeepOnlines = $KeepOnlines;
      return $this;
    }

}
