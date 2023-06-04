<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class Security
{

    /**
     * @var UsernameToken $UsernameToken
     */
    protected $UsernameToken = null;

    /**
     * @var string $SabreAth
     */
    protected $SabreAth = null;

    /**
     * @var string $BinarySecurityToken
     */
    protected $BinarySecurityToken = null;

    /**
     * @param UsernameToken $UsernameToken
     * @param string $SabreAth
     * @param string $BinarySecurityToken
     */
    public function __construct($UsernameToken = null, $SabreAth = null, $BinarySecurityToken = null)
    {
      $this->UsernameToken = $UsernameToken;
      $this->SabreAth = $SabreAth;
      $this->BinarySecurityToken = $BinarySecurityToken;
    }

    /**
     * @return UsernameToken
     */
    public function getUsernameToken()
    {
      return $this->UsernameToken;
    }

    /**
     * @param UsernameToken $UsernameToken
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\Security
     */
    public function setUsernameToken($UsernameToken)
    {
      $this->UsernameToken = $UsernameToken;
      return $this;
    }

    /**
     * @return string
     */
    public function getSabreAth()
    {
      return $this->SabreAth;
    }

    /**
     * @param string $SabreAth
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\Security
     */
    public function setSabreAth($SabreAth)
    {
      $this->SabreAth = $SabreAth;
      return $this;
    }

    /**
     * @return string
     */
    public function getBinarySecurityToken()
    {
      return $this->BinarySecurityToken;
    }

    /**
     * @param string $BinarySecurityToken
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\Security
     */
    public function setBinarySecurityToken($BinarySecurityToken)
    {
      $this->BinarySecurityToken = $BinarySecurityToken;
      return $this;
    }

}
