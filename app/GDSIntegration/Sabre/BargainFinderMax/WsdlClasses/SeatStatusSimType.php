<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SeatStatusSimType
{

    /**
     * @var string $Type
     */
    protected $Type = null;

    /**
     * @var string $Command
     */
    protected $Command = null;

    /**
     * @param string $Type
     * @param string $Command
     */
    public function __construct($Type = null, $Command = null)
    {
      $this->Type = $Type;
      $this->Command = $Command;
    }

    /**
     * @return string
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param string $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SeatStatusSimType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
      return $this->Command;
    }

    /**
     * @param string $Command
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SeatStatusSimType
     */
    public function setCommand($Command)
    {
      $this->Command = $Command;
      return $this;
    }

}
