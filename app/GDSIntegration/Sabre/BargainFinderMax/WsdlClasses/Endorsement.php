<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Endorsement
{

    /**
     * @var FreeTextType $_
     */
    protected $_ = null;

    /**
     * @param FreeTextType $_
     */
    public function __construct($_ = null)
    {
      $this->_ = $_;
    }

    /**
     * @return FreeTextType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param FreeTextType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Endorsement
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

}
