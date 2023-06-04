<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OptionsPerDatePairList
{

    /**
     * @var OptionsPerDatePairType $OptionsPerDatePair
     */
    protected $OptionsPerDatePair = null;

    /**
     * @param OptionsPerDatePairType $OptionsPerDatePair
     */
    public function __construct($OptionsPerDatePair = null)
    {
      $this->OptionsPerDatePair = $OptionsPerDatePair;
    }

    /**
     * @return OptionsPerDatePairType
     */
    public function getOptionsPerDatePair()
    {
      return $this->OptionsPerDatePair;
    }

    /**
     * @param OptionsPerDatePairType $OptionsPerDatePair
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OptionsPerDatePairList
     */
    public function setOptionsPerDatePair($OptionsPerDatePair)
    {
      $this->OptionsPerDatePair = $OptionsPerDatePair;
      return $this;
    }

}
