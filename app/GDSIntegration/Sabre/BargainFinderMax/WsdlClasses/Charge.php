<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Charge
{

    /**
     * @var MonetaryAmountType $EquivalentAmount
     */
    protected $EquivalentAmount = null;

    /**
     * @var CurrencyCodeType $EquivalentCurrency
     */
    protected $EquivalentCurrency = null;

    /**
     * @var int $FirstPiece
     */
    protected $FirstPiece = null;

    /**
     * @var int $LastPiece
     */
    protected $LastPiece = null;

    /**
     * @var string $Description1
     */
    protected $Description1 = null;

    /**
     * @var string $Description2
     */
    protected $Description2 = null;

    /**
     * @var CharacterType $NoChargeNotAvailable
     */
    protected $NoChargeNotAvailable = null;

    /**
     * @param MonetaryAmountType $EquivalentAmount
     * @param CurrencyCodeType $EquivalentCurrency
     * @param int $FirstPiece
     * @param int $LastPiece
     * @param string $Description1
     * @param string $Description2
     * @param CharacterType $NoChargeNotAvailable
     */
    public function __construct($EquivalentAmount = null, $EquivalentCurrency = null, $FirstPiece = null, $LastPiece = null, $Description1 = null, $Description2 = null, $NoChargeNotAvailable = null)
    {
      $this->EquivalentAmount = $EquivalentAmount;
      $this->EquivalentCurrency = $EquivalentCurrency;
      $this->FirstPiece = $FirstPiece;
      $this->LastPiece = $LastPiece;
      $this->Description1 = $Description1;
      $this->Description2 = $Description2;
      $this->NoChargeNotAvailable = $NoChargeNotAvailable;
    }

    /**
     * @return MonetaryAmountType
     */
    public function getEquivalentAmount()
    {
      return $this->EquivalentAmount;
    }

    /**
     * @param MonetaryAmountType $EquivalentAmount
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Charge
     */
    public function setEquivalentAmount($EquivalentAmount)
    {
      $this->EquivalentAmount = $EquivalentAmount;
      return $this;
    }

    /**
     * @return CurrencyCodeType
     */
    public function getEquivalentCurrency()
    {
      return $this->EquivalentCurrency;
    }

    /**
     * @param CurrencyCodeType $EquivalentCurrency
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Charge
     */
    public function setEquivalentCurrency($EquivalentCurrency)
    {
      $this->EquivalentCurrency = $EquivalentCurrency;
      return $this;
    }

    /**
     * @return int
     */
    public function getFirstPiece()
    {
      return $this->FirstPiece;
    }

    /**
     * @param int $FirstPiece
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Charge
     */
    public function setFirstPiece($FirstPiece)
    {
      $this->FirstPiece = $FirstPiece;
      return $this;
    }

    /**
     * @return int
     */
    public function getLastPiece()
    {
      return $this->LastPiece;
    }

    /**
     * @param int $LastPiece
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Charge
     */
    public function setLastPiece($LastPiece)
    {
      $this->LastPiece = $LastPiece;
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Charge
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
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Charge
     */
    public function setDescription2($Description2)
    {
      $this->Description2 = $Description2;
      return $this;
    }

    /**
     * @return CharacterType
     */
    public function getNoChargeNotAvailable()
    {
      return $this->NoChargeNotAvailable;
    }

    /**
     * @param CharacterType $NoChargeNotAvailable
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Charge
     */
    public function setNoChargeNotAvailable($NoChargeNotAvailable)
    {
      $this->NoChargeNotAvailable = $NoChargeNotAvailable;
      return $this;
    }

}
