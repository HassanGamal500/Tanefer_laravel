<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirportInformationType extends ResponseLocationType
{

    /**
     * @var ResponseLocationType $_
     */
    protected $_ = null;

    /**
     * @var AlphaNumericString $TerminalID
     */
    protected $TerminalID = null;

    /**
     * @param string $_
     * @param StringLength1to8 $LocationCode
     * @param StringLength1to32 $CodeContext
     * @param ResponseLocationType $_
     * @param AlphaNumericString $TerminalID
     */
    public function __construct($_ = null, $LocationCode = null, $CodeContext = null, $TerminalID = null)
    {
      parent::__construct($_, $LocationCode, $CodeContext);
      $this->_ = $_;
      $this->TerminalID = $TerminalID;
    }

    /**
     * @return ResponseLocationType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param ResponseLocationType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirportInformationType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return AlphaNumericString
     */
    public function getTerminalID()
    {
      return $this->TerminalID;
    }

    /**
     * @param AlphaNumericString $TerminalID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirportInformationType
     */
    public function setTerminalID($TerminalID)
    {
      $this->TerminalID = $TerminalID;
      return $this;
    }

}
