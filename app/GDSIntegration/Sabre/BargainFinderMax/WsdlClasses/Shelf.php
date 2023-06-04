<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Shelf
{

    /**
     * @var int $Id
     */
    protected $Id = null;

    /**
     * @var SeatComfortType $SeatComfort
     */
    protected $SeatComfort = null;

    /**
     * @param int $Id
     * @param SeatComfortType $SeatComfort
     */
    public function __construct($Id = null, $SeatComfort = null)
    {
      $this->Id = $Id;
      $this->SeatComfort = $SeatComfort;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Shelf
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return SeatComfortType
     */
    public function getSeatComfort()
    {
      return $this->SeatComfort;
    }

    /**
     * @param SeatComfortType $SeatComfort
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Shelf
     */
    public function setSeatComfort($SeatComfort)
    {
      $this->SeatComfort = $SeatComfort;
      return $this;
    }

}
