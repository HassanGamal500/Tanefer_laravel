<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class StreetNmbrType
{

    /**
     * @var StringLength0to64 $_
     */
    protected $_ = null;

    /**
     * @var StringLength1to16 $PO_Box
     */
    protected $PO_Box = null;

    /**
     * @param StringLength0to64 $_
     * @param StringLength1to16 $PO_Box
     */
    public function __construct($_ = null, $PO_Box = null)
    {
      $this->_ = $_;
      $this->PO_Box = $PO_Box;
    }

    /**
     * @return StringLength0to64
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param StringLength0to64 $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StreetNmbrType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return StringLength1to16
     */
    public function getPO_Box()
    {
      return $this->PO_Box;
    }

    /**
     * @param StringLength1to16 $PO_Box
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\StreetNmbrType
     */
    public function setPO_Box($PO_Box)
    {
      $this->PO_Box = $PO_Box;
      return $this;
    }

}
