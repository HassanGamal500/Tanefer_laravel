<?php

namespace App\PaymentGateway;

interface PaymentGatewayInterface{

    public function __construct();
    public function holdAndApproveTransaction($creditCardInfo,$amount,$sessionId);
    public function makeTransaction($transactionId,$amount);
    public function cancelHoldTransaction($transactionId);
    public function refundTransaction($creditCardInfo,$amount,$transactionId);

}