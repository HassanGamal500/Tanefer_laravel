<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class SPKIDataTypeCustom5
{

    /**
     * @var base64Binary $SPKISexp
     */
    protected $SPKISexp = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @param base64Binary $SPKISexp
     * @param string $any
     */
    public function __construct($SPKISexp = null, $any = null)
    {
      $this->SPKISexp = $SPKISexp;
      $this->any = $any;
    }

    /**
     * @return base64Binary
     */
    public function getSPKISexp()
    {
      return $this->SPKISexp;
    }

    /**
     * @param base64Binary $SPKISexp
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SPKIDataTypeCustom5
     */
    public function setSPKISexp($SPKISexp)
    {
      $this->SPKISexp = $SPKISexp;
      return $this;
    }

    /**
     * @return string
     */
    public function getAny()
    {
      return $this->any;
    }

    /**
     * @param string $any
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\SPKIDataTypeCustom5
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

}
