<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Range
{

    /**
     * @var HH_MM $Begin
     */
    protected $Begin = null;

    /**
     * @var HH_MM $End
     */
    protected $End = null;

    /**
     * @var CountOrPercentage $Options
     */
    protected $Options = null;

    /**
     * @param HH_MM $Begin
     * @param HH_MM $End
     * @param CountOrPercentage $Options
     */
    public function __construct($Begin = null, $End = null, $Options = null)
    {
      $this->Begin = $Begin;
      $this->End = $End;
      $this->Options = $Options;
    }

    /**
     * @return HH_MM
     */
    public function getBegin()
    {
      return $this->Begin;
    }

    /**
     * @param HH_MM $Begin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Range
     */
    public function setBegin($Begin)
    {
      $this->Begin = $Begin;
      return $this;
    }

    /**
     * @return HH_MM
     */
    public function getEnd()
    {
      return $this->End;
    }

    /**
     * @param HH_MM $End
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Range
     */
    public function setEnd($End)
    {
      $this->End = $End;
      return $this;
    }

    /**
     * @return CountOrPercentage
     */
    public function getOptions()
    {
      return $this->Options;
    }

    /**
     * @param CountOrPercentage $Options
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Range
     */
    public function setOptions($Options)
    {
      $this->Options = $Options;
      return $this;
    }

}
