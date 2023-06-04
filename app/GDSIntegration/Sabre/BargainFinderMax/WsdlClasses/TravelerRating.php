<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TravelerRating
{

    /**
     * @var Score $Score
     */
    protected $Score = null;

    /**
     * @var FrequentFlyer $FrequentFlyer
     */
    protected $FrequentFlyer = null;

    /**
     * @param Score $Score
     * @param FrequentFlyer $FrequentFlyer
     */
    public function __construct($Score = null, $FrequentFlyer = null)
    {
      $this->Score = $Score;
      $this->FrequentFlyer = $FrequentFlyer;
    }

    /**
     * @return Score
     */
    public function getScore()
    {
      return $this->Score;
    }

    /**
     * @param Score $Score
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerRating
     */
    public function setScore($Score)
    {
      $this->Score = $Score;
      return $this;
    }

    /**
     * @return FrequentFlyer
     */
    public function getFrequentFlyer()
    {
      return $this->FrequentFlyer;
    }

    /**
     * @param FrequentFlyer $FrequentFlyer
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TravelerRating
     */
    public function setFrequentFlyer($FrequentFlyer)
    {
      $this->FrequentFlyer = $FrequentFlyer;
      return $this;
    }

}
