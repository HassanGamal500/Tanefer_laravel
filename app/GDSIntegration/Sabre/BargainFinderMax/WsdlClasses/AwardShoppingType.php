<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class AwardShoppingType
{

    /**
     * @var boolean $Enable
     */
    protected $Enable = null;

    /**
     * @var boolean $UseRAS
     */
    protected $UseRAS = null;

    /**
     * @param boolean $Enable
     * @param boolean $UseRAS
     */
    public function __construct($Enable = null, $UseRAS = null)
    {
      $this->Enable = $Enable;
      $this->UseRAS = $UseRAS;
    }

    /**
     * @return boolean
     */
    public function getEnable()
    {
      return $this->Enable;
    }

    /**
     * @param boolean $Enable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AwardShoppingType
     */
    public function setEnable($Enable)
    {
      $this->Enable = $Enable;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getUseRAS()
    {
      return $this->UseRAS;
    }

    /**
     * @param boolean $UseRAS
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\AwardShoppingType
     */
    public function setUseRAS($UseRAS)
    {
      $this->UseRAS = $UseRAS;
      return $this;
    }

}
