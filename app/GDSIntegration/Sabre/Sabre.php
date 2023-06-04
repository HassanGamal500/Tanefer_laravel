<?php


namespace App\GDSIntegration\Sabre;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\From;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MessageData;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\MessageHeader;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\PartyId;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Security;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\Service;
use App\GDSIntegration\Sabre\BargainFinderMax\WsdlClasses\To;
use App\Models\APIToken;
use App\Models\Client;
use App\Models\ThirdPartyAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Sabre
{
    public $soap_url;
    public $soapContentType;
    public $nowDate;
    public $nowTime;
    public $timeout;
    public $httpClient;
    public $rest_url;
    public $pcc;
    public $username;
    protected $password;
    private $client_id;
    private $sabre;

    public function __construct($client = null)
    {
        try{
            $clientFromRequest = resolve('client');
            $requestClient = $clientFromRequest->parentClient ?? $clientFromRequest;
        }catch (\Exception $e){
            $requestClient = $client;
        }

        $sabre = $requestClient->thirdPartyAccounts->where('third_party_type','sabre')->first();
        if(is_null($sabre)){
            Cache::forget('clients-'.app()->environment());
            $clients = Client::with(['parentClient'])->get();
            Cache::forever('clients-'.app()->environment(),$clients);
        }

        $this->sabre = $sabre;

        $this->nowDate = Carbon::now()->format('Y-m-d');
        $this->nowTime = Carbon::now()->format('H-i-s');
        $this->soap_url = $sabre->soap_url;
        $this->rest_url = $sabre->rest_url;
        $this->username = $sabre->username;
        $this->password = decrypt($sabre->password);
        $this->pcc = $sabre->additional_attr;
        $this->soapContentType = config('sabre.soap_content_type');
        $this->timeout = 20;
        $this->httpClient = new HttpClient();
        $this->client_id = config('sabre.version').':'.$this->username.':'.
            $this->pcc.':'.config('sabre.domain');
        $client_id_encode = base64_encode($this->client_id);
        $client_secret = base64_encode($this->password);
        $this->credential = base64_encode($client_id_encode.':'.$client_secret);
    }

    private function getToken()
    {
        $grant_type = 'grant_type=client_credentials';
        $header = array(
            'Authorization: Basic '.$this->credential,
            'Accept: */*',
            'Content-Type: application/x-www-form-urlencoded'
        );

        $header2 = array_merge($header,[
            $this->client_id,
            $this->password,
            $this->rest_url.'/v2/auth/token'
        ]);

        Storage::put('sabreRequests/'.$this->nowDate.'/getToken/'. $this->nowTime.'getTokenRQ.json',
            json_encode($header2));

        //make curl request on oath/token endpoint
        $ch = curl_init($this->rest_url.'/v2/auth/token');

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $grant_type);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);

        $result = json_decode($res);

        //log getToken response
        Storage::put('sabreRequests/'.$this->nowDate.'/getToken/'.$this->nowTime.'getTokenRS.json',$res);

        $expire_at = Carbon::now()->addSeconds($result->expires_in)->format('Y-m-d H:i:s');

        $this->sabre->update([
            'token' => $result->access_token,
            'token_expire_at' => $expire_at
        ]);
        Cache::forget('clients-'.app()->environment());

        return $result->access_token;
    }

    protected function getAccessToken()
    {
        if($this->sabre->token_expire_at < Carbon::now()){
            $token = $this->getToken();
        }else{
            $token = $this->sabre->token;
        }
        return $token;
    }


    private function createSoapSessionRQ()
    {
        $session_xml = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:eb="http://www.ebxml.org/namespaces/messageHeader" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xsd="http://www.w3.org/1999/XMLSchema">
            <SOAP-ENV:Header>
                    <eb:MessageHeader SOAP-ENV:mustUnderstand="1" eb:version="1.0">
                            <eb:From>
                                    <eb:PartyId type="urn:x12.org:IO5:01">adamtravel.com</eb:PartyId>
                            </eb:From>
                            <eb:To>
                                    <eb:PartyId type="urn:x12.org:IO5:01">webservices.sabre.com</eb:PartyId>
                            </eb:To>
                            <eb:CPAId>'.$this->pcc.'</eb:CPAId>
                            <eb:ConversationId>info@adamtravel.com</eb:ConversationId>
                            <eb:Service>SessionCreateRQ</eb:Service>
                            <eb:Action>SessionCreateRQ</eb:Action>
                            <eb:MessageData>
                                    <eb:MessageId>mid:20031209-133003-2333@adamtravel.com</eb:MessageId>
                                    <eb:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</eb:Timestamp>
                                    <eb:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</eb:TimeToLive>
                            </eb:MessageData>
                    </eb:MessageHeader>
                    <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext" xmlns:wsu="http://schemas.xmlsoap.org/ws/2002/12/utility">
                            <wsse:UsernameToken>
                                    <wsse:Username>'.$this->username.'</wsse:Username>
                                    <wsse:Password>'.$this->password.'</wsse:Password>
                                    <Organization>'.$this->pcc.'</Organization>
                                    <Domain>AA</Domain>
                            </wsse:UsernameToken>
                    </wsse:Security>
            </SOAP-ENV:Header>
            <SOAP-ENV:Body>

                    <SessionCreateRQ>
                                    <POS>
                                            <Source PseudoCityCode="'.$this->pcc.'"/>
                                    </POS>
                    </SessionCreateRQ>

            </SOAP-ENV:Body>
        </SOAP-ENV:Envelope>';

        return $session_xml;
    }

    private function closeSessionRQ($session_token)
    {
        $xml = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                    <SOAP-ENV:Header>
                        <m:MessageHeader xmlns:m="http://www.ebxml.org/namespaces/messageHeader">
                            <m:From>
                                <m:PartyId type="urn:x12.org:IO5:01">SWS</m:PartyId>
                            </m:From>
                            <m:To>
                                <m:PartyId type="urn:x12.org:IO5:01">webservices.sabre.com</m:PartyId>
                            </m:To>
                            <m:CPAId>'.$this->pcc.'</m:CPAId>
                            <m:ConversationId>info@adamtravel.com</m:ConversationId>
                            <m:Service m:type="OTA">Air Shopping Service</m:Service>
                            <m:Action>SessionCloseRQ</m:Action>
                            <m:MessageData>
                                <m:MessageId>mid:20031209-133003-2333@adamtravel.com</m:MessageId>
                                <m:Timestamp>'.date("Y-m-d\TH:i:s\Z").'</m:Timestamp>
                                <m:TimeToLive>'.date("Y-m-d\TH:i:s\Z").'</m:TimeToLive>
                            </m:MessageData>
                            <m:DuplicateElimination/>
                            <m:Description>Close Session Token</m:Description>
                        </m:MessageHeader>
                        <wsse:Security xmlns:wsse="http://schemas.xmlsoap.org/ws/2002/12/secext">
                            <wsse:BinarySecurityToken valueType="String" EncodingType="wsse:Base64Binary">
                            ' . $session_token . '
                            </wsse:BinarySecurityToken>
                        </wsse:Security>
                    </SOAP-ENV:Header>
                    <SOAP-ENV:Body>
                        <SessionCloseRQ Version="1.0.0" xmlns="http://www.opentravel.org/OTA/2002/11"/>
                    </SOAP-ENV:Body>
                    </SOAP-ENV:Envelope>';

        return $xml;
    }

    public function getSoapSession()
    {
        for ($i = 0; $i < 3; $i++) {
            //log get session request
            Storage::put('sabreRequests/' . $this->nowDate . '/SoapSession/' . $this->nowTime . 'openSessionRQ.xml', $this->createSoapSessionRQ());

            $http_client = new HttpClient();

            $response = $http_client->executeSoapCall($this->createSoapSessionRQ(), $this->soap_url, $this->soapContentType, $this->timeout);

            //log get session response
            Storage::put('sabreRequests/' . $this->nowDate . '/SoapSession/' . $this->nowTime . 'openSessionRS.xml', $response['xmlResponse']);

            $arrayResponse = $response['arrayResponse'];


            try {
                $value = $arrayResponse['soap-env:Envelope']['soap-env:Header']['wsse:Security']['wsse:BinarySecurityToken']['value'];
                return $value;
            } catch (\Exception $e) {
                //sendErrorToMail($e);
            }
        }
        throw new \Exception();
    }

    public function closeSoapSession($session_token)
    {

        //log close session request
        Storage::put('sabreRequests/'.$this->nowDate.'/SoapSession/'.$this->nowTime.'closeSessionRQ.xml',$this->closeSessionRQ($session_token));

        $http_client = new HttpClient();

        $response = $http_client->executeSoapCall($this->closeSessionRQ($session_token),$this->soap_url,$this->soapContentType,$this->timeout);

        //log close session response
        Storage::put('sabreRequests/'.$this->nowDate.'/SoapSession/'.$this->nowTime.'closeSessionRS.xml',$response['xmlResponse']);

        $arrayResponse = $response['arrayResponse'];

        return $arrayResponse;
    }


    /**
     * Create Soap Call Headers For Sabre Soap APIs
     *
     * @return \SoapHeader[]
     * */
    protected function soapHeaders($action,$token)
    {
        $messageHeader = new \SoapHeader('http://www.ebxml.org/namespaces/messageHeader','MessageHeader',
            $this->messageHeader($action,'OTA'));
        $security = new \SoapHeader('http://schemas.xmlsoap.org/ws/2002/12/secext','Security',$this->security($token));

        return [$messageHeader,$security];
    }



    /**
     * Create Soap Message Header
     *
     * @return MessageHeader
     * */
    protected function messageHeader($serviceAction,$serviceType)
    {
        $messageHeader = new MessageHeader($this->from(),$this->to(),$this->pcc,request()->getClientIp(),
            $this->service($serviceAction,$serviceType)
            ,$serviceAction,$this->messageData(),'',$serviceAction,'','');

        return $messageHeader;
    }


    /**
     * Create Soap From Header
     *
     * @return From
     * */
    protected function from()
    {
        $from = new From($this->partyId('from'),'');

        return $from;
    }


    /**
     * Create Soap To Header
     *
     * @return To
     * */
    protected function to()
    {
        $to = new To($this->partyId('to'),'');

        return $to;
    }


    /**
     * Create PartyID Header
     *
     * @return PartyId
     * */
    protected function partyId($source)
    {
        if($source == 'from'){
            $partyId = new PartyId(app()->environment('local')?'adamtravel.com':url('/'),'urn:x12.org:IO5:01');
        }else{
            $partyId = new PartyId('webservices.sabre.com','urn:x12.org:IO5:01');
        }

        return $partyId;
    }

    /**
     * Create Service Header
     *
     * @return Service
     * */
    protected function service($serviceAction,$serviceType)
    {
        $service = new Service($serviceAction,$serviceType);

        return $service;
    }

    /**
     * Create Soap Security Header
     *
     * @return Security
     * */
    protected function security($token)
    {
        $security = new Security('','',$token);

        return $security;
    }

    /**
     * Create MessageData Header
     *
     * @return MessageData
     * */
    protected function messageData()
    {
        $messageId = 'mid:'.request()->getClientIp().'@'.url('/');
        $timeToLive = Carbon::now()->addSeconds(60);

        $messageData = new MessageData($messageId,date("Y-m-d\TH:i:s\Z"),$messageId,$timeToLive,60);

        return $messageData;
    }

}
