<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ChangeFees
{

    /**
     * @var ChangeFee $ChangeFee
     */
    protected $ChangeFee = null;

    /**
     * @param ChangeFee $ChangeFee
     */
    public function __construct($ChangeFee = null)
    {
      $this->ChangeFee = $ChangeFee;
    }

    /**
     * @return ChangeFee
     */
    public function getChangeFee()
    {
      return $this->ChangeFee;
    }

    /**
     * @param ChangeFee $ChangeFee
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ChangeFees
     */
    public function setChangeFee($ChangeFee)
    {
      $this->ChangeFee = $ChangeFee;
      return $this;
    }

}
