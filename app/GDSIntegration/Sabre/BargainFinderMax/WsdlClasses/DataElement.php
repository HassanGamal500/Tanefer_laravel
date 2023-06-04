<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class DataElement
{

    /**
     * @var boolean $SubjectToGovernmentApproval
     */
    protected $SubjectToGovernmentApproval = null;

    /**
     * @param boolean $SubjectToGovernmentApproval
     */
    public function __construct($SubjectToGovernmentApproval = null)
    {
      $this->SubjectToGovernmentApproval = $SubjectToGovernmentApproval;
    }

    /**
     * @return boolean
     */
    public function getSubjectToGovernmentApproval()
    {
      return $this->SubjectToGovernmentApproval;
    }

    /**
     * @param boolean $SubjectToGovernmentApproval
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\DataElement
     */
    public function setSubjectToGovernmentApproval($SubjectToGovernmentApproval)
    {
      $this->SubjectToGovernmentApproval = $SubjectToGovernmentApproval;
      return $this;
    }

}
