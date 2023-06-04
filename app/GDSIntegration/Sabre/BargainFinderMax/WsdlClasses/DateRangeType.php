<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DateRangeType
{

    /**
     * @var date $OutboundDate
     */
    protected $OutboundDate = null;

    /**
     * @var int $DateRange
     */
    protected $DateRange = null;

    /**
     * @param date $OutboundDate
     * @param int $DateRange
     */
    public function __construct($OutboundDate = null, $DateRange = null)
    {
      $this->OutboundDate = $OutboundDate;
      $this->DateRange = $DateRange;
    }

    /**
     * @return date
     */
    public function getOutboundDate()
    {
      return $this->OutboundDate;
    }

    /**
     * @param date $OutboundDate
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateRangeType
     */
    public function setOutboundDate($OutboundDate)
    {
      $this->OutboundDate = $OutboundDate;
      return $this;
    }

    /**
     * @return int
     */
    public function getDateRange()
    {
      return $this->DateRange;
    }

    /**
     * @param int $DateRange
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DateRangeType
     */
    public function setDateRange($DateRange)
    {
      $this->DateRange = $DateRange;
      return $this;
    }

}
