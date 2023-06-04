<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ValidatingCarrierType
{

    /**
     * @var Preference[] $Preference
     */
    protected $Preference = null;

    /**
     * @var CarrierCode $Code
     */
    protected $Code = null;

    /**
     * @param CarrierCode $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return Preference[]
     */
    public function getPreference()
    {
      return $this->Preference;
    }

    /**
     * @param Preference[] $Preference
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierType
     */
    public function setPreference(array $Preference = null)
    {
      $this->Preference = $Preference;
      return $this;
    }

    /**
     * @return CarrierCode
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param CarrierCode $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValidatingCarrierType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
