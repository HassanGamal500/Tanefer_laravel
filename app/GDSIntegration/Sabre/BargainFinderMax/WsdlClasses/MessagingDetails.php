<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class MessagingDetails
{

    /**
     * @var MDRSubset $MDRSubset
     */
    protected $MDRSubset = null;

    /**
     * @param MDRSubset $MDRSubset
     */
    public function __construct($MDRSubset = null)
    {
      $this->MDRSubset = $MDRSubset;
    }

    /**
     * @return MDRSubset
     */
    public function getMDRSubset()
    {
      return $this->MDRSubset;
    }

    /**
     * @param MDRSubset $MDRSubset
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MessagingDetails
     */
    public function setMDRSubset($MDRSubset)
    {
      $this->MDRSubset = $MDRSubset;
      return $this;
    }

}
