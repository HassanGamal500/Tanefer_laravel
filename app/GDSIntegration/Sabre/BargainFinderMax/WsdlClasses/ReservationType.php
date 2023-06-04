<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ReservationType
{

    /**
     * @var ReservationStatusType $Status
     */
    protected $Status = null;

    /**
     * @var ReservationStatusType $RealStatus
     */
    protected $RealStatus = null;

    /**
     * @param ReservationStatusType $Status
     * @param ReservationStatusType $RealStatus
     */
    public function __construct($Status = null, $RealStatus = null)
    {
      $this->Status = $Status;
      $this->RealStatus = $RealStatus;
    }

    /**
     * @return ReservationStatusType
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param ReservationStatusType $Status
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReservationType
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return ReservationStatusType
     */
    public function getRealStatus()
    {
      return $this->RealStatus;
    }

    /**
     * @param ReservationStatusType $RealStatus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReservationType
     */
    public function setRealStatus($RealStatus)
    {
      $this->RealStatus = $RealStatus;
      return $this;
    }

}
