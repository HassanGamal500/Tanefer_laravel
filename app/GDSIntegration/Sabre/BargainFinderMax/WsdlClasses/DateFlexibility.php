<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DateFlexibility
{

    /**
     * @var int $NbrOfDays
     */
    protected $NbrOfDays = null;

    /**
     * @var int $Plus
     */
    protected $Plus = null;

    /**
     * @var int $Minus
     */
    protected $Minus = null;

    /**
     * @var boolean $Validate
     */
    protected $Validate = null;

    /**
     * @var boolean $Tolerance
     */
    protected $Tolerance = null;

    /**
     * @param int $NbrOfDays
     * @param int $Plus
     * @param int $Minus
     * @param boolean $Validate
     * @param boolean $Tolerance
     */
    public function __construct($NbrOfDays = null, $Plus = null, $Minus = null, $Validate = null, $Tolerance = null)
    {
      $this->NbrOfDays = $NbrOfDays;
      $this->Plus = $Plus;
      $this->Minus = $Minus;
      $this->Validate = $Validate;
      $this->Tolerance = $Tolerance;
    }

    /**
     * @return int
     */
    public function getNbrOfDays()
    {
      return $this->NbrOfDays;
    }

    /**
     * @param int $NbrOfDays
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateFlexibility
     */
    public function setNbrOfDays($NbrOfDays)
    {
      $this->NbrOfDays = $NbrOfDays;
      return $this;
    }

    /**
     * @return int
     */
    public function getPlus()
    {
      return $this->Plus;
    }

    /**
     * @param int $Plus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateFlexibility
     */
    public function setPlus($Plus)
    {
      $this->Plus = $Plus;
      return $this;
    }

    /**
     * @return int
     */
    public function getMinus()
    {
      return $this->Minus;
    }

    /**
     * @param int $Minus
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateFlexibility
     */
    public function setMinus($Minus)
    {
      $this->Minus = $Minus;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getValidate()
    {
      return $this->Validate;
    }

    /**
     * @param boolean $Validate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateFlexibility
     */
    public function setValidate($Validate)
    {
      $this->Validate = $Validate;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getTolerance()
    {
      return $this->Tolerance;
    }

    /**
     * @param boolean $Tolerance
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateFlexibility
     */
    public function setTolerance($Tolerance)
    {
      $this->Tolerance = $Tolerance;
      return $this;
    }

}
