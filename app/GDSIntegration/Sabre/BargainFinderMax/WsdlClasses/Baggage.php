<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Baggage
{

    /**
     * @var BaggageRequestType $RequestType
     */
    protected $RequestType = null;

    /**
     * @var boolean $Description
     */
    protected $Description = null;

    /**
     * @var int $RequestedPieces
     */
    protected $RequestedPieces = null;

    /**
     * @var boolean $FreePieceRequired
     */
    protected $FreePieceRequired = null;

    /**
     * @param BaggageRequestType $RequestType
     * @param boolean $Description
     * @param int $RequestedPieces
     * @param boolean $FreePieceRequired
     */
    public function __construct($RequestType = null, $Description = null, $RequestedPieces = null, $FreePieceRequired = null)
    {
      $this->RequestType = $RequestType;
      $this->Description = $Description;
      $this->RequestedPieces = $RequestedPieces;
      $this->FreePieceRequired = $FreePieceRequired;
    }

    /**
     * @return BaggageRequestType
     */
    public function getRequestType()
    {
      return $this->RequestType;
    }

    /**
     * @param string $RequestType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Baggage
     */
    public function setRequestType($RequestType)
    {
      $this->RequestType = $RequestType;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getDescription()
    {
      return $this->Description;
    }

    /**
     * @param boolean $Description
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Baggage
     */
    public function setDescription($Description)
    {
      $this->Description = $Description;
      return $this;
    }

    /**
     * @return int
     */
    public function getRequestedPieces()
    {
      return $this->RequestedPieces;
    }

    /**
     * @param int $RequestedPieces
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Baggage
     */
    public function setRequestedPieces($RequestedPieces)
    {
      $this->RequestedPieces = $RequestedPieces;
      return $this;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Baggage
     */
    public function setFreePieceRequired($FreePieceRequired)
    {
      $this->FreePieceRequired = $FreePieceRequired;
      return $this;
    }

}
