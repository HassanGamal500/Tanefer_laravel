<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SideTripType
{

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @var boolean $Start
     */
    protected $Start = null;

    /**
     * @var boolean $End
     */
    protected $End = null;

    /**
     * @param int $Number
     * @param boolean $Start
     * @param boolean $End
     */
    public function __construct($Number = null, $Start = null, $End = null)
    {
      $this->Number = $Number;
      $this->Start = $Start;
      $this->End = $End;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param int $Number
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SideTripType
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getStart()
    {
      return $this->Start;
    }

    /**
     * @param boolean $Start
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SideTripType
     */
    public function setStart($Start)
    {
      $this->Start = $Start;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getEnd()
    {
      return $this->End;
    }

    /**
     * @param boolean $End
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SideTripType
     */
    public function setEnd($End)
    {
      $this->End = $End;
      return $this;
    }

}
