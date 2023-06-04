<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class DSAKeyValueTypeCustom3
{

    /**
     * @var CryptoBinary $P
     */
    protected $P = null;

    /**
     * @var CryptoBinary $Q
     */
    protected $Q = null;

    /**
     * @var CryptoBinary $G
     */
    protected $G = null;

    /**
     * @var CryptoBinary $Y
     */
    protected $Y = null;

    /**
     * @var CryptoBinary $J
     */
    protected $J = null;

    /**
     * @var CryptoBinary $Seed
     */
    protected $Seed = null;

    /**
     * @var CryptoBinary $PgenCounter
     */
    protected $PgenCounter = null;

    /**
     * @param CryptoBinary $P
     * @param CryptoBinary $Q
     * @param CryptoBinary $Y
     * @param CryptoBinary $Seed
     * @param CryptoBinary $PgenCounter
     */
    public function __construct($P = null, $Q = null, $Y = null, $Seed = null, $PgenCounter = null)
    {
      $this->P = $P;
      $this->Q = $Q;
      $this->Y = $Y;
      $this->Seed = $Seed;
      $this->PgenCounter = $PgenCounter;
    }

    /**
     * @return CryptoBinary
     */
    public function getP()
    {
      return $this->P;
    }

    /**
     * @param CryptoBinary $P
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DSAKeyValueTypeCustom3
     */
    public function setP($P)
    {
      $this->P = $P;
      return $this;
    }

    /**
     * @return CryptoBinary
     */
    public function getQ()
    {
      return $this->Q;
    }

    /**
     * @param CryptoBinary $Q
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DSAKeyValueTypeCustom3
     */
    public function setQ($Q)
    {
      $this->Q = $Q;
      return $this;
    }

    /**
     * @return CryptoBinary
     */
    public function getG()
    {
      return $this->G;
    }

    /**
     * @param CryptoBinary $G
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DSAKeyValueTypeCustom3
     */
    public function setG($G)
    {
      $this->G = $G;
      return $this;
    }

    /**
     * @return CryptoBinary
     */
    public function getY()
    {
      return $this->Y;
    }

    /**
     * @param CryptoBinary $Y
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DSAKeyValueTypeCustom3
     */
    public function setY($Y)
    {
      $this->Y = $Y;
      return $this;
    }

    /**
     * @return CryptoBinary
     */
    public function getJ()
    {
      return $this->J;
    }

    /**
     * @param CryptoBinary $J
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DSAKeyValueTypeCustom3
     */
    public function setJ($J)
    {
      $this->J = $J;
      return $this;
    }

    /**
     * @return CryptoBinary
     */
    public function getSeed()
    {
      return $this->Seed;
    }

    /**
     * @param CryptoBinary $Seed
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DSAKeyValueTypeCustom3
     */
    public function setSeed($Seed)
    {
      $this->Seed = $Seed;
      return $this;
    }

    /**
     * @return CryptoBinary
     */
    public function getPgenCounter()
    {
      return $this->PgenCounter;
    }

    /**
     * @param CryptoBinary $PgenCounter
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\DSAKeyValueTypeCustom3
     */
    public function setPgenCounter($PgenCounter)
    {
      $this->PgenCounter = $PgenCounter;
      return $this;
    }

}
