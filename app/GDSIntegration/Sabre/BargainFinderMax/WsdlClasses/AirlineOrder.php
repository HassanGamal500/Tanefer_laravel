<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AirlineOrder
{

    /**
     * @var CompanyNameType $_
     */
    protected $_ = null;

    /**
     * @var int $SequenceNumber
     */
    protected $SequenceNumber = null;

    /**
     * @param CompanyNameType $_
     * @param int $SequenceNumber
     */
    public function __construct($_ = null, $SequenceNumber = null)
    {
      $this->_ = $_;
      $this->SequenceNumber = $SequenceNumber;
    }

    /**
     * @return CompanyNameType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param CompanyNameType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineOrder
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return int
     */
    public function getSequenceNumber()
    {
      return $this->SequenceNumber;
    }

    /**
     * @param int $SequenceNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AirlineOrder
     */
    public function setSequenceNumber($SequenceNumber)
    {
      $this->SequenceNumber = $SequenceNumber;
      return $this;
    }

}
