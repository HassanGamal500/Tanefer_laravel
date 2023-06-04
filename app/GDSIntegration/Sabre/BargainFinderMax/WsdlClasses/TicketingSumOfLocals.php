<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TicketingSumOfLocals
{

    /**
     * @var boolean $Enable
     */
    protected $Enable = null;

    /**
     * @param boolean $Enable
     */
    public function __construct($Enable = null)
    {
      $this->Enable = $Enable;
    }

    /**
     * @return boolean
     */
    public function getEnable()
    {
      return $this->Enable;
    }

    /**
     * @param boolean $Enable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TicketingSumOfLocals
     */
    public function setEnable($Enable)
    {
      $this->Enable = $Enable;
      return $this;
    }

}
