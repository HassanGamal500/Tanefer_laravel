<?php

namespace App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses;

class FareMessagesType
{

    /**
     * @var Message $Message
     */
    protected $Message = null;

    /**
     * @param Message $Message
     */
    public function __construct($Message = null)
    {
      $this->Message = $Message;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param Message $Message
     * @return \App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\FareMessagesType
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
