<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AlternateDatesProcessing
{

    /**
     * @var boolean $CalendarMode
     */
    protected $CalendarMode = null;

    /**
     * @var int $NumOptionsPerAlternateDate
     */
    protected $NumOptionsPerAlternateDate = null;

    /**
     * @param boolean $CalendarMode
     * @param int $NumOptionsPerAlternateDate
     */
    public function __construct($CalendarMode = null, $NumOptionsPerAlternateDate = null)
    {
      $this->CalendarMode = $CalendarMode;
      $this->NumOptionsPerAlternateDate = $NumOptionsPerAlternateDate;
    }

    /**
     * @return boolean
     */
    public function getCalendarMode()
    {
      return $this->CalendarMode;
    }

    /**
     * @param boolean $CalendarMode
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateDatesProcessing
     */
    public function setCalendarMode($CalendarMode)
    {
      $this->CalendarMode = $CalendarMode;
      return $this;
    }

    /**
     * @return int
     */
    public function getNumOptionsPerAlternateDate()
    {
      return $this->NumOptionsPerAlternateDate;
    }

    /**
     * @param int $NumOptionsPerAlternateDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AlternateDatesProcessing
     */
    public function setNumOptionsPerAlternateDate($NumOptionsPerAlternateDate)
    {
      $this->NumOptionsPerAlternateDate = $NumOptionsPerAlternateDate;
      return $this;
    }

}
