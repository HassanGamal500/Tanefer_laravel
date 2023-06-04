<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelerRefNumberType
{

    /**
     * @var RPH_Type $RPH
     */
    protected $RPH = null;

    /**
     * @param RPH_Type $RPH
     */
    public function __construct($RPH = null)
    {
      $this->RPH = $RPH;
    }

    /**
     * @return RPH_Type
     */
    public function getRPH()
    {
      return $this->RPH;
    }

    /**
     * @param RPH_Type $RPH
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerRefNumberType
     */
    public function setRPH($RPH)
    {
      $this->RPH = $RPH;
      return $this;
    }

}
