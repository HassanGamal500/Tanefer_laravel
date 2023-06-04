<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class Rule
{

    /**
     * @var string $Type
     */
    protected $Type = null;

    /**
     * @var int $ID
     */
    protected $ID = null;

    /**
     * @param string $Type
     * @param int $ID
     */
    public function __construct($Type = null, $ID = null)
    {
      $this->Type = $Type;
      $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param string $Type
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Rule
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return int
     */
    public function getID()
    {
      return $this->ID;
    }

    /**
     * @param int $ID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Rule
     */
    public function setID($ID)
    {
      $this->ID = $ID;
      return $this;
    }

}
