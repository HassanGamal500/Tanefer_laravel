<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ResponseSorting
{

    /**
     * @var boolean $EnableChronologicalSorting
     */
    protected $EnableChronologicalSorting = null;

    /**
     * @var boolean $SortFaresInsideItin
     */
    protected $SortFaresInsideItin = null;

    /**
     * @param boolean $EnableChronologicalSorting
     * @param boolean $SortFaresInsideItin
     */
    public function __construct($EnableChronologicalSorting = null, $SortFaresInsideItin = null)
    {
      $this->EnableChronologicalSorting = $EnableChronologicalSorting;
      $this->SortFaresInsideItin = $SortFaresInsideItin;
    }

    /**
     * @return boolean
     */
    public function getEnableChronologicalSorting()
    {
      return $this->EnableChronologicalSorting;
    }

    /**
     * @param boolean $EnableChronologicalSorting
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResponseSorting
     */
    public function setEnableChronologicalSorting($EnableChronologicalSorting)
    {
      $this->EnableChronologicalSorting = $EnableChronologicalSorting;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getSortFaresInsideItin()
    {
      return $this->SortFaresInsideItin;
    }

    /**
     * @param boolean $SortFaresInsideItin
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ResponseSorting
     */
    public function setSortFaresInsideItin($SortFaresInsideItin)
    {
      $this->SortFaresInsideItin = $SortFaresInsideItin;
      return $this;
    }

}
