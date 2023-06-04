<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ReissueInfoList
{

    /**
     * @var ReissueInfoType $ReissueInfo
     */
    protected $ReissueInfo = null;

    /**
     * @param ReissueInfoType $ReissueInfo
     */
    public function __construct($ReissueInfo = null)
    {
      $this->ReissueInfo = $ReissueInfo;
    }

    /**
     * @return ReissueInfoType
     */
    public function getReissueInfo()
    {
      return $this->ReissueInfo;
    }

    /**
     * @param ReissueInfoType $ReissueInfo
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ReissueInfoList
     */
    public function setReissueInfo($ReissueInfo)
    {
      $this->ReissueInfo = $ReissueInfo;
      return $this;
    }

}
