<?php
namespace App\GDSIntegration\Tbo\AvailableHotelRooms;
class Supplement
{

    /**
     * @var string $type
     * @access public
     */
    public $type = null;

    /**
     * @var int $id
     * @access public
     */
    public $id = null;

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @var boolean $isMandatory
     * @access public
     */
    public $isMandatory = null;

    /**
     * @var string $chargeType
     * @access public
     */
    public $chargeType = null;

    /**
     * @var float $price
     * @access public
     */
    public $price = null;

    /**
     * @var string $currencyCode
     * @access public
     */
    public $currencyCode = null;

    /**
     * @param string $Type
     * @param int $SuppID
     * @param string $SuppName
     * @param boolean $SuppIsMandatory
     * @param string $SuppChargeType
     * @param float $Price
     * @param string $CurrencyCode
     * @access public
     */
    public function __construct($Type, $SuppID, $SuppName, $SuppIsMandatory,
                                $SuppChargeType, $Price, $CurrencyCode)
    {
      $this->type = $Type;
      $this->id = $SuppID;
      $this->name = $SuppName;
      $this->isMandatory = $SuppIsMandatory;
      $this->chargeType = $SuppChargeType;
      $this->price = $Price;
      $this->currencyCode = $CurrencyCode;
    }

}
