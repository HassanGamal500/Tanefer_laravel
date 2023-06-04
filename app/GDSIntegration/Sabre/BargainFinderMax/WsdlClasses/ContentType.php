<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ContentType
{

    /**
     * @var anonymous187 $Type
     */
    protected $Type = null;

    /**
     * @param anonymous187 $Type
     */
    public function __construct($Type = null)
    {
      $this->Type = $Type;
    }

    /**
     * @return anonymous187
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param anonymous187 $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ContentType
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

}
