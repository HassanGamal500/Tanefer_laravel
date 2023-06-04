<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class RequestType
{

    /**
     * @var IntelliSellRequestType $_
     */
    protected $_ = null;

    /**
     * @var string $Name
     */
    protected $Name = null;

    /**
     * @param IntelliSellRequestType $_
     * @param string $Name
     */
    public function __construct($_ = null, $Name = null)
    {
      $this->_ = $_;
      $this->Name = $Name;
    }

    /**
     * @return IntelliSellRequestType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param IntelliSellRequestType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param string $Name
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\RequestType
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

}
