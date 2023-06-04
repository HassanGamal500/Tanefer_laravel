<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BaggageType
{

    /**
     * @var boolean $FreePieceRequired
     */
    protected $FreePieceRequired = null;

    /**
     * @param boolean $FreePieceRequired
     */
    public function __construct($FreePieceRequired = null)
    {
      $this->FreePieceRequired = $FreePieceRequired;
    }

    /**
     * @return boolean
     */
    public function getFreePieceRequired()
    {
      return $this->FreePieceRequired;
    }

    /**
     * @param boolean $FreePieceRequired
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BaggageType
     */
    public function setFreePieceRequired($FreePieceRequired)
    {
      $this->FreePieceRequired = $FreePieceRequired;
      return $this;
    }

}
