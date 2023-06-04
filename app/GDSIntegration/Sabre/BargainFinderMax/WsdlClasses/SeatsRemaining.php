<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SeatsRemaining
{

    /**
     * @var int $Number
     */
    protected $Number = null;

    /**
     * @var boolean $BelowMin
     */
    protected $BelowMin = null;

    /**
     * @param int $Number
     * @param boolean $BelowMin
     */
    public function __construct($Number = null, $BelowMin = null)
    {
      $this->Number = $Number;
      $this->BelowMin = $BelowMin;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SeatsRemaining
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getBelowMin()
    {
      return $this->BelowMin;
    }

    /**
     * @param boolean $BelowMin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SeatsRemaining
     */
    public function setBelowMin($BelowMin)
    {
      $this->BelowMin = $BelowMin;
      return $this;
    }

}
