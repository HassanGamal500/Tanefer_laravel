<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class POS_Type
{

    /**
     * @var SourceType[] $Source
     */
    protected $Source = null;

    /**
     * @param SourceType[] $Source
     */
    public function __construct(array $Source = null)
    {
      $this->Source = $Source;
    }

    /**
     * @return SourceType[]
     */
    public function getSource()
    {
      return $this->Source;
    }

    /**
     * @param SourceType[] $Source
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\POS_Type
     */
    public function setSource(array $Source)
    {
      $this->Source = $Source;
      return $this;
    }

}
