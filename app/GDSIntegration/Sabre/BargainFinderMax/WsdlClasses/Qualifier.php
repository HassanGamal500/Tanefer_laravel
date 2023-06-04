<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Qualifier
{

    /**
     * @var StringLength1to128 $Name
     */
    protected $Name = null;

    /**
     * @var StringLength1to128 $Value
     */
    protected $Value = null;

    /**
     * @param StringLength1to128 $Name
     * @param StringLength1to128 $Value
     */
    public function __construct($Name = null, $Value = null)
    {
      $this->Name = $Name;
      $this->Value = $Value;
    }

    /**
     * @return StringLength1to128
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param StringLength1to128 $Name
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Qualifier
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return StringLength1to128
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param StringLength1to128 $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Qualifier
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
