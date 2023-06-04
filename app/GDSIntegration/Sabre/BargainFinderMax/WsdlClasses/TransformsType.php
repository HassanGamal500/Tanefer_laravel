<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class TransformsType
{

    /**
     * @var TransformType $Transform
     */
    protected $Transform = null;

    /**
     * @param TransformType $Transform
     */
    public function __construct($Transform = null)
    {
      $this->Transform = $Transform;
    }

    /**
     * @return TransformType
     */
    public function getTransform()
    {
      return $this->Transform;
    }

    /**
     * @param TransformType $Transform
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\TransformsType
     */
    public function setTransform($Transform)
    {
      $this->Transform = $Transform;
      return $this;
    }

}
