<?php


namespace App\GDSIntegration\Sabre\GetCreditCardApproval;


use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CC_Info;
use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CompletionCodes;
use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\Credit;
use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationRQ;
use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\CreditVerificationService;
use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\ItinTotalFare;
use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\PaymentCard;
use App\GDSIntegration\Sabre\GetCreditCardApproval\WsdlClasses\TotalFare;
use App\GDSIntegration\Sabre\Sabre;
use Illuminate\Support\Facades\Storage;

class CreditCardApproval extends Sabre
{
    public function approve($requestData,$airlineCode)
    {
        $creditVerificationService = new CreditVerificationService([
            'trace' => true,
            'exception'=> true,
            'uri' => $this->soap_url
        ]);

        $action = 'CreditVerificationLLSRQ';

        $token = $this->getSoapSession();

        $creditVerificationService->__setSoapHeaders($this->soapHeaders($action,$token));
        $creditVerificationService->__setLocation($this->soap_url);

        try {
            $startCallTime = microtime(true);
            $response = $creditVerificationService->CreditVerificationRQ($this->creditVerificationRQ($requestData,$airlineCode));
            $endCallTime = microtime(true);
            $requestTime = $endCallTime - $startCallTime;
            if(! app()->environment('production')){
                Storage::put('/sabreRequests/'.$this->nowDate.'/creditCardApproval/'.$this->nowTime.'approve'.'RQ.xml',
                    $creditVerificationService->__getLastRequest());
            }
            Storage::put('/sabreRequests/'.$this->nowDate.'/creditCardApproval/'.$this->nowTime.'approve'.'RS.xml',
                $creditVerificationService->__getLastResponse());
            Storage::append('/sabreRequests/'.$this->nowDate.'/creditCardApproval/searchCallTime.txt',$this->nowTime.' '.'Request Time: '.$requestTime."\n");
        }catch (\Exception $exception){
            sendErrorToMail($exception);
            return 'SomeThing Went Wrong';
        }

        $this->closeSoapSession($token);

        if($response->getApplicationResults()->getStatus() == CompletionCodes::Complete){
            return true;
        }else{
            return false;
        }
    }

    private function creditVerificationRQ($requestData,$airlineCode)
    {
        $paymentCard = new PaymentCard($requestData->creditCardType,null,
            $requestData->creditCardNumber,$requestData->creditCardExpireDate,$airlineCode);

        $ccInfo = new CC_Info($paymentCard);

        $totalFare = new TotalFare(1,'USD');
        $itinTotalFare = new ItinTotalFare($totalFare);

        $credit = new Credit($ccInfo,$itinTotalFare);

        $creditVerificationRQ = new CreditVerificationRQ($credit);
        $creditVerificationRQ->setVersion('2.2.0');

        return $creditVerificationRQ;
    }
}
