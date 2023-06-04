<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Description
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var language $lang
     */
    protected $lang = null;

    /**
     * @param string $_
     * @param language $lang
     */
    public function __construct($_ = null, $lang = null)
    {
      $this->_ = $_;
      $this->lang = $lang;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Description
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return language
     */
    public function getLang()
    {
      return $this->lang;
    }

    /**
     * @param language $lang
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Description
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

}
