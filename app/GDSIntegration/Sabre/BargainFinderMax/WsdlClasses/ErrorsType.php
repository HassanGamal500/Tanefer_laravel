<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ErrorsType
{

    /**
     * @var ErrorType[] $Error
     */
    protected $Error = null;

    /**
     * @param ErrorType[] $Error
     */
    public function __construct(array $Error = null)
    {
      $this->Error = $Error;
    }

    /**
     * @return ErrorType[]
     */
    public function getError()
    {
      return $this->Error;
    }

    /**
     * @param ErrorType[] $Error
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ErrorsType
     */
    public function setError(array $Error)
    {
      $this->Error = $Error;
      return $this;
    }

}
