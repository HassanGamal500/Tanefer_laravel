<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class LegsTaxes
{

    /**
     * @var LegTaxes $LegTaxes
     */
    protected $LegTaxes = null;

    /**
     * @param LegTaxes $LegTaxes
     */
    public function __construct($LegTaxes = null)
    {
      $this->LegTaxes = $LegTaxes;
    }

    /**
     * @return LegTaxes
     */
    public function getLegTaxes()
    {
      return $this->LegTaxes;
    }

    /**
     * @param LegTaxes $LegTaxes
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\LegsTaxes
     */
    public function setLegTaxes($LegTaxes)
    {
      $this->LegTaxes = $LegTaxes;
      return $this;
    }

}
