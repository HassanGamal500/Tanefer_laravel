<?php

namespace App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses;

class ReferenceCustom2
{

    /**
     * @var Schema $Schema
     */
    protected $Schema = null;

    /**
     * @var Description $Description
     */
    protected $Description = null;

    /**
     * @var string $any
     */
    protected $any = null;

    /**
     * @var ID $id
     */
    protected $id = null;

    /**
     * @var anonymous77 $type
     */
    protected $type = null;

    /**
     * @var anyURI $href
     */
    protected $href = null;

    /**
     * @var anyURI $role
     */
    protected $role = null;

    /**
     * @param Schema $Schema
     * @param Description $Description
     * @param string $any
     * @param ID $id
     * @param anonymous77 $type
     * @param anyURI $href
     * @param anyURI $role
     */
    public function __construct($Schema = null, $Description = null, $any = null, $id = null, $type = null, $href = null, $role = null)
    {
      $this->Schema = $Schema;
      $this->Description = $Description;
      $this->any = $any;
      $this->id = $id;
      $this->type = $type;
      $this->href = $href;
      $this->role = $role;
    }

    /**
     * @return Schema
     */
    public function getSchema()
    {
      return $this->Schema;
    }

    /**
     * @param Schema $Schema
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceCustom2
     */
    public function setSchema($Schema)
    {
      $this->Schema = $Schema;
      return $this;
    }

    /**
     * @return Description
     */
    public function getDescription()
    {
      return $this->Description;
    }

    /**
     * @param Description $Description
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceCustom2
     */
    public function setDescription($Description)
    {
      $this->Description = $Description;
      return $this;
    }

    /**
     * @return string
     */
    public function getAny()
    {
      return $this->any;
    }

    /**
     * @param string $any
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceCustom2
     */
    public function setAny($any)
    {
      $this->any = $any;
      return $this;
    }

    /**
     * @return ID
     */
    public function getId()
    {
      return $this->id;
    }

    /**
     * @param ID $id
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceCustom2
     */
    public function setId($id)
    {
      $this->id = $id;
      return $this;
    }

    /**
     * @return anonymous77
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param anonymous77 $type
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceCustom2
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getHref()
    {
      return $this->href;
    }

    /**
     * @param anyURI $href
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceCustom2
     */
    public function setHref($href)
    {
      $this->href = $href;
      return $this;
    }

    /**
     * @return anyURI
     */
    public function getRole()
    {
      return $this->role;
    }

    /**
     * @param anyURI $role
     * @return \App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ReferenceCustom2
     */
    public function setRole($role)
    {
      $this->role = $role;
      return $this;
    }

}
