<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternateTime
{

    /**
     * @var Numeric0to9 $PlusMinus
     */
    protected $PlusMinus = null;

    /**
     * @var Numeric0to9 $Plus
     */
    protected $Plus = null;

    /**
     * @var Numeric0to72 $Minus
     */
    protected $Minus = null;

    /**
     * @param Numeric0to9 $PlusMinus
     * @param Numeric0to9 $Plus
     * @param Numeric0to72 $Minus
     */
    public function __construct($PlusMinus = null, $Plus = null, $Minus = null)
    {
      $this->PlusMinus = $PlusMinus;
      $this->Plus = $Plus;
      $this->Minus = $Minus;
    }

    /**
     * @return Numeric0to9
     */
    public function getPlusMinus()
    {
      return $this->PlusMinus;
    }

    /**
     * @param Numeric0to9 $PlusMinus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateTime
     */
    public function setPlusMinus($PlusMinus)
    {
      $this->PlusMinus = $PlusMinus;
      return $this;
    }

    /**
     * @return Numeric0to9
     */
    public function getPlus()
    {
      return $this->Plus;
    }

    /**
     * @param Numeric0to9 $Plus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateTime
     */
    public function setPlus($Plus)
    {
      $this->Plus = $Plus;
      return $this;
    }

    /**
     * @return Numeric0to72
     */
    public function getMinus()
    {
      return $this->Minus;
    }

    /**
     * @param Numeric0to72 $Minus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateTime
     */
    public function setMinus($Minus)
    {
      $this->Minus = $Minus;
      return $this;
    }

}
