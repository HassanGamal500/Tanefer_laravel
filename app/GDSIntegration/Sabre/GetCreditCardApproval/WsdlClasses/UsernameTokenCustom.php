<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class UsernameTokenCustom
{

    /**
     * @var string $Username
     */
    protected $Username = null;

    /**
     * @var string $Password
     */
    protected $Password = null;

    /**
     * @var string $NewPassword
     */
    protected $NewPassword = null;

    /**
     * @var string $Organization
     */
    protected $Organization = null;

    /**
     * @var string $Domain
     */
    protected $Domain = null;

    /**
     * @param string $Username
     * @param string $Password
     * @param string $NewPassword
     * @param string $Organization
     * @param string $Domain
     */
    public function __construct($Username = null, $Password = null, $NewPassword = null, $Organization = null, $Domain = null)
    {
      $this->Username = $Username;
      $this->Password = $Password;
      $this->NewPassword = $NewPassword;
      $this->Organization = $Organization;
      $this->Domain = $Domain;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
      return $this->Username;
    }

    /**
     * @param string $Username
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\UsernameTokenCustom
     */
    public function setUsername($Username)
    {
      $this->Username = $Username;
      return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
      return $this->Password;
    }

    /**
     * @param string $Password
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\UsernameTokenCustom
     */
    public function setPassword($Password)
    {
      $this->Password = $Password;
      return $this;
    }

    /**
     * @return string
     */
    public function getNewPassword()
    {
      return $this->NewPassword;
    }

    /**
     * @param string $NewPassword
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\UsernameTokenCustom
     */
    public function setNewPassword($NewPassword)
    {
      $this->NewPassword = $NewPassword;
      return $this;
    }

    /**
     * @return string
     */
    public function getOrganization()
    {
      return $this->Organization;
    }

    /**
     * @param string $Organization
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\UsernameTokenCustom
     */
    public function setOrganization($Organization)
    {
      $this->Organization = $Organization;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
      return $this->Domain;
    }

    /**
     * @param string $Domain
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\UsernameTokenCustom
     */
    public function setDomain($Domain)
    {
      $this->Domain = $Domain;
      return $this;
    }

}
