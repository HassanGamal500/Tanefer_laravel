<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class HostCommandCustom3
{

    /**
     * @var TextLong $_
     */
    protected $_ = null;

    /**
     * @var string $LNIATA
     */
    protected $LNIATA = null;

    /**
     * @param TextLong $_
     * @param string $LNIATA
     */
    public function __construct($_ = null, $LNIATA = null)
    {
      $this->_ = $_;
      $this->LNIATA = $LNIATA;
    }

    /**
     * @return TextLong
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param TextLong $_
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\HostCommandCustom3
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return string
     */
    public function getLNIATA()
    {
      return $this->LNIATA;
    }

    /**
     * @param string $LNIATA
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\HostCommandCustom3
     */
    public function setLNIATA($LNIATA)
    {
      $this->LNIATA = $LNIATA;
      return $this;
    }

}
