<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelerInfoSummary_TPA_ExtensionsType
{

    /**
     * @var TravelerRating[] $TravelerRating
     */
    protected $TravelerRating = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return TravelerRating[]
     */
    public function getTravelerRating()
    {
      return $this->TravelerRating;
    }

    /**
     * @param TravelerRating[] $TravelerRating
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerInfoSummary_TPA_ExtensionsType
     */
    public function setTravelerRating(array $TravelerRating = null)
    {
      $this->TravelerRating = $TravelerRating;
      return $this;
    }

}
