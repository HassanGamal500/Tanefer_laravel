<?php

namespace App\GDSIntegration\Tbo;

class ResponseStatus
{

    /**
     * @var string $StatusCode
     * @access public
     */
    public $StatusCode = null;

    /**
     * @var string $Description
     * @access public
     */
    public $Description = null;

    /**
     * @var string $Category
     * @access public
     */
    public $Category = null;

    /**
     * @param string $StatusCode
     * @param string $Description
     * @param string $Category
     * @access public
     */
    public function __construct($StatusCode, $Description, $Category)
    {
      $this->StatusCode = (int)$StatusCode;
      $this->Description = $Description;
      $this->Category = $Category;
    }

}
