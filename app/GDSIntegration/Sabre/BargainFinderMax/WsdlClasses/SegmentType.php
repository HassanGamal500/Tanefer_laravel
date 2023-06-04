<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SegmentType
{

    /**
     * @var anonymous441 $Code
     */
    protected $Code = null;

    /**
     * @param anonymous441 $Code
     */
    public function __construct($Code = null)
    {
      $this->Code = $Code;
    }

    /**
     * @return anonymous441
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param anonymous441 $Code
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SegmentType
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

}
