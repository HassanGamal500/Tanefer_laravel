<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class OneWayItineraries
{

    /**
     * @var BrandedOneWayItineraries $BrandedOneWayItineraries
     */
    protected $BrandedOneWayItineraries = null;

    /**
     * @var SimpleOneWayItineraries $SimpleOneWayItineraries
     */
    protected $SimpleOneWayItineraries = null;

    /**
     * @param BrandedOneWayItineraries $BrandedOneWayItineraries
     * @param SimpleOneWayItineraries $SimpleOneWayItineraries
     */
    public function __construct($BrandedOneWayItineraries = null, $SimpleOneWayItineraries = null)
    {
      $this->BrandedOneWayItineraries = $BrandedOneWayItineraries;
      $this->SimpleOneWayItineraries = $SimpleOneWayItineraries;
    }

    /**
     * @return BrandedOneWayItineraries
     */
    public function getBrandedOneWayItineraries()
    {
      return $this->BrandedOneWayItineraries;
    }

    /**
     * @param BrandedOneWayItineraries $BrandedOneWayItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OneWayItineraries
     */
    public function setBrandedOneWayItineraries($BrandedOneWayItineraries)
    {
      $this->BrandedOneWayItineraries = $BrandedOneWayItineraries;
      return $this;
    }

    /**
     * @return SimpleOneWayItineraries
     */
    public function getSimpleOneWayItineraries()
    {
      return $this->SimpleOneWayItineraries;
    }

    /**
     * @param SimpleOneWayItineraries $SimpleOneWayItineraries
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\OneWayItineraries
     */
    public function setSimpleOneWayItineraries($SimpleOneWayItineraries)
    {
      $this->SimpleOneWayItineraries = $SimpleOneWayItineraries;
      return $this;
    }

}
