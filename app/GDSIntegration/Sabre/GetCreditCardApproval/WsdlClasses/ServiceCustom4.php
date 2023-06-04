<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ServiceCustom4
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var nonemptystring $type
     */
    protected $type = null;

    /**
     * @param string $_
     * @param nonemptystring $type
     */
    public function __construct($_ = null, $type = null)
    {
      $this->_ = $_;
      $this->type = $type;
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
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ServiceCustom4
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return nonemptystring
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param nonemptystring $type
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ServiceCustom4
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

}
