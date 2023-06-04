<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Segment
{

    /**
     * @var int $Id
     */
    protected $Id = null;

    /**
     * @param int $Id
     */
    public function __construct($Id = null)
    {
      $this->Id = $Id;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Segment
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

}
