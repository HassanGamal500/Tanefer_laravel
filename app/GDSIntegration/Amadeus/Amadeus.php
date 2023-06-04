<?php


namespace App\GDSIntegration\Amadeus;


use Amadeus\Client\Params;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Amadeus
{
    protected $soap_url;
    protected $nowDate;
    protected $nowTime;
    protected $timeout;
    protected $rest_url;
    protected $pcc;
    private $username;
    private $password;
    protected $amadeus;
    protected $client;


    public function __construct($client = null)
    {
        if(is_null($client)){
            $clientFromRequest = resolve('client');
            $requestClient = $clientFromRequest->parentClient ?? $clientFromRequest;
        }else{
            $requestClient = $client;
        }
        $this->client = $requestClient;

        $amadeus = $requestClient->thirdPartyAccounts->where('third_party_type','amadeus')->first();
        if(is_null($amadeus)){
            Cache::forget('clients-'.app()->environment());
            $clients = Client::with(['parentClient'])->get();
            Cache::forever('clients-'.app()->environment(),$clients);
        }

        $this->amadeus = $amadeus;
        $this->soap_url = $amadeus->soap_url;
        $this->username = $amadeus->username;
        $this->password = decrypt($amadeus->password);
        $this->pcc = $amadeus->additional_attr;
        $this->nowDate = Carbon::now()->format('Y-m-d');
        $this->nowTime = Carbon::now()->format('H-i-s');

    }

    public function statelessClient()
    {
        return new \Amadeus\Client($this->headerParameters());
    }

    public function statefulClient()
    {
        return new \Amadeus\Client($this->headerParameters(true));
    }

    private function headerParameters($isStateful = false)
    {

        if(app()->environment('production')){
            $wsdlPath = app_path('GDSIntegration/Amadeus/ProdWsdl');
        }else{
            $wsdlPath = app_path('GDSIntegration/Amadeus/DevWsdl/1ASIWADAD1V_PDT_20210607_120649.wsdl');
        }
       return new Params([
            'authParams' => [
                'officeId' => $this->pcc,
                'userId' => $this->username,
                'passwordData' => base64_encode($this->password)
            ],
            'sessionHandlerParams' => [
                'soapHeaderVersion' => \Amadeus\Client::HEADER_V4,
                'wsdl' => $wsdlPath,
                'stateful' => $isStateful,
            ],
            'requestCreatorParams' => [
                'receivedFrom' => $this->client->name
            ],
            'returnXml' => false,
        ]);
    }

    protected function cabinClass(string $cabinClassCode)
    {
        switch ($cabinClassCode){
            case 'M':
                $cabinClass = 'economy';
                break;
            case 'F':
                $cabinClass = 'first';
                break;
            case 'W':
                $cabinClass = 'premium economy';
                break;
            case 'C':
                $cabinClass = 'business';
                break;
            default:
                $cabinClass = 'unknown';
        }

        return $cabinClass;
    }

    protected function formatDate($date)
    {
        return Carbon::createFromFormat('dmy', $date)->format('Y-m-d');
    }

    protected function formatTime($time)
    {
        return Carbon::createFromFormat('Hi', $time)->format('H:i');
    }
}
