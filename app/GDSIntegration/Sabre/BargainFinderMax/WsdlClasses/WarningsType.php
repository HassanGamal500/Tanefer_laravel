<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class WarningsType
{

    /**
     * @var WarningType[] $Warning
     */
    protected $Warning = null;

    /**
     * @param WarningType[] $Warning
     */
    public function __construct(array $Warning = null)
    {
      $this->Warning = $Warning;
    }

    /**
     * @return WarningType[]
     */
    public function getWarning()
    {
      return $this->Warning;
    }

    /**
     * @param WarningType[] $Warning
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\WarningsType
     */
    public function setWarning(array $Warning)
    {
      $this->Warning = $Warning;
      return $this;
    }

}
