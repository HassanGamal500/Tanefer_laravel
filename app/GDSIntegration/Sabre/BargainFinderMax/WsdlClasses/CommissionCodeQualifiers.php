<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class CommissionCodeQualifiers
{

    /**
     * @var CommissionCodeQualifier $CommissionCodeQualifier
     */
    protected $CommissionCodeQualifier = null;

    /**
     * @param CommissionCodeQualifier $CommissionCodeQualifier
     */
    public function __construct($CommissionCodeQualifier = null)
    {
      $this->CommissionCodeQualifier = $CommissionCodeQualifier;
    }

    /**
     * @return CommissionCodeQualifier
     */
    public function getCommissionCodeQualifier()
    {
      return $this->CommissionCodeQualifier;
    }

    /**
     * @param CommissionCodeQualifier $CommissionCodeQualifier
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\CommissionCodeQualifiers
     */
    public function setCommissionCodeQualifier($CommissionCodeQualifier)
    {
      $this->CommissionCodeQualifier = $CommissionCodeQualifier;
      return $this;
    }

}
