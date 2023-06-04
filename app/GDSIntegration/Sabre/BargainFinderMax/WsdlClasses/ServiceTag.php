<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ServiceTag
{

    /**
     * @var ServiceTagType $_
     */
    protected $_ = null;

    /**
     * @var string $Name
     */
    protected $Name = null;

    /**
     * @param ServiceTagType $_
     * @param string $Name
     */
    public function __construct($_ = null, $Name = null)
    {
      $this->_ = $_;
      $this->Name = $Name;
    }

    /**
     * @return ServiceTagType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param ServiceTagType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ServiceTag
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ServiceTag
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

}
