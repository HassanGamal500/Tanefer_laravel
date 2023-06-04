<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FreeTextType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var language $Language
     */
    protected $Language = null;

    /**
     * @param string $_
     * @param language $Language
     */
    public function __construct($_ = null, $Language = null)
    {
      $this->_ = $_;
      $this->Language = $Language;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FreeTextType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return language
     */
    public function getLanguage()
    {
      return $this->Language;
    }

    /**
     * @param language $Language
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FreeTextType
     */
    public function setLanguage($Language)
    {
      $this->Language = $Language;
      return $this;
    }

}
