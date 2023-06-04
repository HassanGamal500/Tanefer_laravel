<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class DescriptionCustom5
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DescriptionCustom5
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DescriptionCustom5
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

}
