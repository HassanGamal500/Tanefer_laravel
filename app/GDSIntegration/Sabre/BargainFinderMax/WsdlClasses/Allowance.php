<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Allowance
{

    /**
     * @var int $Pieces
     */
    protected $Pieces = null;

    /**
     * @var int $Weight
     */
    protected $Weight = null;

    /**
     * @var WeightUnitType $Unit
     */
    protected $Unit = null;

    /**
     * @var string $Description1
     */
    protected $Description1 = null;

    /**
     * @var string $Description2
     */
    protected $Description2 = null;

    /**
     * @param int $Pieces
     * @param int $Weight
     * @param WeightUnitType $Unit
     * @param string $Description1
     * @param string $Description2
     */
    public function __construct($Pieces = null, $Weight = null, $Unit = null, $Description1 = null, $Description2 = null)
    {
      $this->Pieces = $Pieces;
      $this->Weight = $Weight;
      $this->Unit = $Unit;
      $this->Description1 = $Description1;
      $this->Description2 = $Description2;
    }

    /**
     * @return int
     */
    public function getPieces()
    {
      return $this->Pieces;
    }

    /**
     * @param int $Pieces
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Allowance
     */
    public function setPieces($Pieces)
    {
      $this->Pieces = $Pieces;
      return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
      return $this->Weight;
    }

    /**
     * @param int $Weight
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Allowance
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

    /**
     * @return WeightUnitType
     */
    public function getUnit()
    {
      return $this->Unit;
    }

    /**
     * @param WeightUnitType $Unit
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Allowance
     */
    public function setUnit($Unit)
    {
      $this->Unit = $Unit;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription1()
    {
      return $this->Description1;
    }

    /**
     * @param string $Description1
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Allowance
     */
    public function setDescription1($Description1)
    {
      $this->Description1 = $Description1;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription2()
    {
      return $this->Description2;
    }

    /**
     * @param string $Description2
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Allowance
     */
    public function setDescription2($Description2)
    {
      $this->Description2 = $Description2;
      return $this;
    }

}
