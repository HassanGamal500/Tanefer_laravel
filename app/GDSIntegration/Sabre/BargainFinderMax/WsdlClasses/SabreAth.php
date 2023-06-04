<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class SabreAth
{

    /**
     * @var string $Value
     */
    protected $Value = null;

    /**
     * @var string $BinarySecToken
     */
    protected $BinarySecToken = null;

    /**
     * @var string $ConversationID
     */
    protected $ConversationID = null;

    /**
     * @param string $Value
     * @param string $BinarySecToken
     * @param string $ConversationID
     */
    public function __construct($Value = null, $BinarySecToken = null, $ConversationID = null)
    {
      $this->Value = $Value;
      $this->BinarySecToken = $BinarySecToken;
      $this->ConversationID = $ConversationID;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param string $Value
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SabreAth
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

    /**
     * @return string
     */
    public function getBinarySecToken()
    {
      return $this->BinarySecToken;
    }

    /**
     * @param string $BinarySecToken
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SabreAth
     */
    public function setBinarySecToken($BinarySecToken)
    {
      $this->BinarySecToken = $BinarySecToken;
      return $this;
    }

    /**
     * @return string
     */
    public function getConversationID()
    {
      return $this->ConversationID;
    }

    /**
     * @param string $ConversationID
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\SabreAth
     */
    public function setConversationID($ConversationID)
    {
      $this->ConversationID = $ConversationID;
      return $this;
    }

}
