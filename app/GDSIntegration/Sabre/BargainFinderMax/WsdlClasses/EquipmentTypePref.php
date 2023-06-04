<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class EquipmentTypePref extends EquipmentType
{

    /**
     * @var EquipmentType $_
     */
    protected $_ = null;

    /**
     * @var boolean $WideBody
     */
    protected $WideBody = null;

    /**
     * @var PreferLevelType $PreferLevel
     */
    protected $PreferLevel = null;

    /**
     * @param string $_
     * @param StringLength3 $AirEquipType
     * @param boolean $ChangeofGauge
     * @param EquipmentType $_
     * @param boolean $WideBody
     * @param PreferLevelType $PreferLevel
     */
    public function __construct($_ = null, $AirEquipType = null, $ChangeofGauge = null, $WideBody = null, $PreferLevel = null)
    {
      parent::__construct($_, $AirEquipType, $ChangeofGauge);
      $this->_ = $_;
      $this->WideBody = $WideBody;
      $this->PreferLevel = $PreferLevel;
    }

    /**
     * @return EquipmentType
     */
    public function get_()
    {
      return $this->_;
    }

    /**
     * @param EquipmentType $_
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EquipmentTypePref
     */
    public function set_($_)
    {
      $this->_ = $_;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getWideBody()
    {
      return $this->WideBody;
    }

    /**
     * @param boolean $WideBody
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EquipmentTypePref
     */
    public function setWideBody($WideBody)
    {
      $this->WideBody = $WideBody;
      return $this;
    }

    /**
     * @return PreferLevelType
     */
    public function getPreferLevel()
    {
      return $this->PreferLevel;
    }

    /**
     * @param PreferLevelType $PreferLevel
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\EquipmentTypePref
     */
    public function setPreferLevel($PreferLevel)
    {
      $this->PreferLevel = $PreferLevel;
      return $this;
    }

}
