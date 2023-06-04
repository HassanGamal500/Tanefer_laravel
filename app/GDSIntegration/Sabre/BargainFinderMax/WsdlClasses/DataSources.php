<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DataSources
{

    /**
     * @var ToggleType $ATPCO
     */
    protected $ATPCO = null;

    /**
     * @var ToggleType $LCC
     */
    protected $LCC = null;

    /**
     * @var ToggleType $NDC
     */
    protected $NDC = null;

    /**
     * @param ToggleType $ATPCO
     * @param ToggleType $LCC
     * @param ToggleType $NDC
     */
    public function __construct($ATPCO = null, $LCC = null, $NDC = null)
    {
      $this->ATPCO = $ATPCO;
      $this->LCC = $LCC;
      $this->NDC = $NDC;
    }

    /**
     * @return ToggleType
     */
    public function getATPCO()
    {
      return $this->ATPCO;
    }

    /**
     * @param ToggleType $ATPCO
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DataSources
     */
    public function setATPCO($ATPCO)
    {
      $this->ATPCO = $ATPCO;
      return $this;
    }

    /**
     * @return ToggleType
     */
    public function getLCC()
    {
      return $this->LCC;
    }

    /**
     * @param ToggleType $LCC
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DataSources
     */
    public function setLCC($LCC)
    {
      $this->LCC = $LCC;
      return $this;
    }

    /**
     * @return ToggleType
     */
    public function getNDC()
    {
      return $this->NDC;
    }

    /**
     * @param ToggleType $NDC
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DataSources
     */
    public function setNDC($NDC)
    {
      $this->NDC = $NDC;
      return $this;
    }

}
