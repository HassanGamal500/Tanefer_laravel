<?php


namespace App\PaymentGateway;


use Carbon\Carbon;
use App\Models\ThirdPartyAccount;
use net\authorize\util\LogFactory;
use Illuminate\Support\Facades\Storage;
use App\PaymentGateway\PaymentGatewayInterface;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\TransactionRequestType;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\controller\CreateTransactionController;

class AuthorizeNet implements PaymentGatewayInterface
{
    public $refId;
    protected $merchantAuthentication;
    protected $url;

    public function __construct()
    {
        $paymentGateWay = ThirdPartyAccount::paymentGateway()->paymentMethod('AuthorizeNet')->first();
        $this->merchantAuthentication = new MerchantAuthenticationType();
        $this->merchantAuthentication->setName($paymentGateWay->username);
        $this->merchantAuthentication->setTransactionKey(decrypt($paymentGateWay->password));
        $this->url = $paymentGateWay->rest_url;
        $this->refId = 'ref' . time();
    }

    public function holdAndApproveTransaction($creditCardInfo,$mount,$sessionId)
    {
        $paymentType =  $this->creditCardTransaction($creditCardInfo);
        // Create a transaction
        $transactionRequestType = new TransactionRequestType();
        $transactionRequestType->setTransactionType("authOnlyTransaction");
        $transactionRequestType->setAmount($mount);
        $transactionRequestType->setPayment($paymentType);
        $response = $this->createTransactionRequest($transactionRequestType);

        return $response;
    }

    public function makeTransaction($transactionId,$amount)
    {
        $transactionRequestType = new TransactionRequestType();
        $transactionRequestType->setTransactionType("priorAuthCaptureTransaction");
        $transactionRequestType->setRefTransId($transactionId);

        $response = $this->createTransactionRequest($transactionRequestType);

        return $response;
    }

    public function cancelHoldTransaction($transactionId)
    {
        $transactionRequestType = new TransactionRequestType();
        $transactionRequestType->setTransactionType( "voidTransaction");
        $transactionRequestType->setRefTransId($transactionId);

        $response = $this->createTransactionRequest($transactionRequestType);

        return $response;
    }

    public function refundTransaction($creditCardInfo,$amount,$transactionId)
    {
        $transactionRequest = new TransactionRequestType();
        $transactionRequest->setTransactionType( "refundTransaction");
        $transactionRequest->setAmount($amount);
        $paymentOne = $this->creditCardTransaction($creditCardInfo);
        $transactionRequest->setPayment($paymentOne);
        $transactionRequest->setRefTransId($transactionId);

        $response = $this->createTransactionRequest($transactionRequest);

        return $response;
    }

    private function creditCardTransaction($creditCardInfo)
    {
        // Create the payment data for a credit card
        $creditCard = new CreditCardType();
        $creditCard->setCardNumber($creditCardInfo['card_number']);
        $creditCard->setExpirationDate( $creditCardInfo['card_expiry_date']);
        $creditCard->setCardCode($creditCardInfo['card_code']);
        $paymentOne = new PaymentType();
        $paymentOne->setCreditCard($creditCard);

        return $paymentOne;
    }

    private function createTransactionRequest($transactionRequestType)
    {
        $transactionRequest = new CreateTransactionRequest();
        $transactionRequest->setMerchantAuthentication($this->merchantAuthentication);
        $transactionRequest->setTransactionRequest( $transactionRequestType);

        $controller = new CreateTransactionController($transactionRequest);
        $response = $controller->executeWithApiResponse( $this->url);

        return $response;
    }

    public function responseStatusAndMessage($response)
    {
        if ($response != null)
        {
            if($response->getMessages()->getResultCode() == "Ok")
            {
                $tresponse = $response->getTransactionResponse();
                Storage::put('paymentGateway/'.Carbon::now().'responseStatusAndMessage.json',json_encode($tresponse)."\n");

                if ($tresponse != null && $tresponse->getMessages() != null)
                {
                    $authCode = $tresponse->getAuthCode();
                    $transactionId =  $tresponse->getTransId();
                    return apiResponse(['authCode' => $authCode,'transactionId'=>$transactionId],'Success',true);
                }
                else
                {
                    if($tresponse->getErrors() != null)
                    {
                       $errorMessage = $tresponse->getErrors()[0]->getErrorText();
                       return apiResponse([],$errorMessage,false);
                    }
                }
            }
            else
            {
                $tresponse = $response->getTransactionResponse();
                Storage::put('paymentGateway/'.Carbon::now().'responseStatusAndMessage.json',json_encode($tresponse)."\n");
                if($tresponse != null && $tresponse->getErrors() != null)
                {
                    $errorMessage =  $tresponse->getErrors()[0]->getErrorText();
                    return apiResponse([],$errorMessage,false);
                }
                else
                {
                    $errorMessage = $response->getMessages()->getMessage()[0]->getText();
                    return apiResponse([],$errorMessage,false);
                }
            }
        }
        else
        {
            return apiResponse([], "No response returned",false);
        }

    }
}
