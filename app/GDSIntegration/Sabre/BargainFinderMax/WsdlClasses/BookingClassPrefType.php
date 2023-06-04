<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class BookingClassPrefType
{

    /**
     * @var UpperCaseAlphaLength1to2 $ResBookDesigCode
     */
    protected $ResBookDesigCode = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param UpperCaseAlphaLength1to2 $ResBookDesigCode
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($ResBookDesigCode = null, $PreferLevel = null)
    {
      $this->ResBookDesigCode = $ResBookDesigCode;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return UpperCaseAlphaLength1to2
     */
    public function getResBookDesigCode()
    {
      return $this->ResBookDesigCode;
    }

    /**
     * @param UpperCaseAlphaLength1to2 $ResBookDesigCode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookingClassPrefType
     */
    public function setResBookDesigCode($ResBookDesigCode)
    {
      $this->ResBookDesigCode = $ResBookDesigCode;
      return $this;
    }

    /**
     * @return PreferLevelType
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param PreferLevelType $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\BookingClassPrefType
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
