<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class EquipmentType
{

    /**
     * @var string $_
     */
    protected $_ = null;

    /**
     * @var StringLength3 $AirEquipType
     */
    protected $AirEquipType = null;

    /**
     * @var boolean $ChangeofGauge
     */
    protected $ChangeofGauge = null;

    /**
     * @param string $_
     * @param StringLength3 $AirEquipType
     * @param boolean $ChangeofGauge
     */
    public function __construct($_ = null, $AirEquipType = null, $ChangeofGauge = null)
    {
      $this->_ = $_;
      $this->AirEquipType = $AirEquipType;
      $this->ChangeofGauge = $ChangeofGauge;
    }

    /**
     * @return string
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param string $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EquipmentType
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return StringLength3
     */
    public function getAirEquipType()
    {
      return $this->AirEquipType;
    }

    /**
     * @param StringLength3 $AirEquipType
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EquipmentType
     */
    public function setAirEquipType($AirEquipType)
    {
      $this->AirEquipType = $AirEquipType;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getChangeofGauge()
    {
      return $this->ChangeofGauge;
    }

    /**
     * @param boolean $ChangeofGauge
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EquipmentType
     */
    public function setChangeofGauge($ChangeofGauge)
    {
      $this->ChangeofGauge = $ChangeofGauge;
      return $this;
    }

}
