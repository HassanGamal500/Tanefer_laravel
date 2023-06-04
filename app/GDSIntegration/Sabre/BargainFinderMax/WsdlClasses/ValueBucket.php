<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class ValueBucket
{

    /**
     * @var float $PriceTimeValueRank
     */
    protected $PriceTimeValueRank = null;

    /**
     * @var int $ValueBucketNumber
     */
    protected $ValueBucketNumber = null;

    /**
     * @param float $PriceTimeValueRank
     * @param int $ValueBucketNumber
     */
    public function __construct($PriceTimeValueRank = null, $ValueBucketNumber = null)
    {
      $this->PriceTimeValueRank = $PriceTimeValueRank;
      $this->ValueBucketNumber = $ValueBucketNumber;
    }

    /**
     * @return float
     */
    public function getPriceTimeValueRank()
    {
      return $this->PriceTimeValueRank;
    }

    /**
     * @param float $PriceTimeValueRank
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValueBucket
     */
    public function setPriceTimeValueRank($PriceTimeValueRank)
    {
      $this->PriceTimeValueRank = $PriceTimeValueRank;
      return $this;
    }

    /**
     * @return int
     */
    public function getValueBucketNumber()
    {
      return $this->ValueBucketNumber;
    }

    /**
     * @param int $ValueBucketNumber
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\ValueBucket
     */
    public function setValueBucketNumber($ValueBucketNumber)
    {
      $this->ValueBucketNumber = $ValueBucketNumber;
      return $this;
    }

}
