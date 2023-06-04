<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class sequenceNumbertypeCustom
{

    /**
     * @var int $_
     */
    protected $_ = null;

    /**
     * @var statustype $status
     */
    protected $status = null;

    /**
     * @param int $_
     * @param statustype $status
     */
    public function __construct($_ = null, $status = null)
    {
      $this->_ = $_;
      $this->status = $status;
    }

    /**
     * @return int
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param int $_
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\sequenceNumbertypeCustom
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return statustype
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * @param statustype $status
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\sequenceNumbertypeCustom
     */
    public function setStatus($status)
    {
      $this->status = $status;
      return $this;
    }

}
