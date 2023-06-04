<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\PaymentGateway\PaymentGatewayInterface;

class ClientAuthentication
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->getRequestUri() == '/api/paymentNotifications'){
            return $next($request);
        }

        $mobileSecret = request()->header('clientSecret');
        $url = request()->header('origin');
        $clientIp = request()->header('clientip');

        $authenticateFactor = $mobileSecret ?? $url;

        $isAuthenticate = $this->isAuthenticate($authenticateFactor, app()->environment(),$clientIp);

        if ($isAuthenticate) {
            return $next($request);
        } else {
            return apiResponse('', 'unAuthorized', false);
        }
    }


    private function isAuthenticate(string $authenticateFactor = null,string $appEnv,string $clientIp)
    {
        if($appEnv == 'local' ||
            ($clientIp == '172.31.24.81' && $appEnv == 'production') ||
            ($clientIp == '172.31.0.193' && $appEnv == 'development') ||
            ($authenticateFactor == 'https://sbcheckout.payfort.com' )){
            // if(Cache::has('clients-'.app()->environment())){
            //     $clients = Cache::get('clients-'.app()->environment());
            //     $client = $clients->where('url','=','https://demo.tanefer.com')->first();
            // }else{
                $client = Client::where('name','Tanefer')->first();
            // }
            $this->setClient($client);
            return true;
        }elseif(is_null($authenticateFactor) && $authenticateFactor == ''){
            return false;
        }else{
            if(strpos($authenticateFactor,'www.')){
                $authenticateFactor = str_replace('www.','',$authenticateFactor);
            }
            if(Cache::has('clients-'.app()->environment())){
                $clients = Cache::get('clients-'.app()->environment());
                $client = $clients->where('url',$authenticateFactor)->where('block',0)->first();
            }else{
                $client = Client::where('url',$authenticateFactor)->where('block',0)->first();
            }

            if(is_null($client)){
                return false;
            }

            $this->setClient($client);
            return true;
        }
    }

    private function setClient(Client $client)
    {
        request()->headers->set('applicationName',$client->name);
        app()->bind('client',function () use ($client){
                return $client;
            });

        $mainClient = $client->parentClient ?? $client;
        if(! is_null($mainClient->thirdPartyAccounts()->paymentGateway()->first())){
            $paymentGateway = $mainClient->thirdPartyAccounts()->paymentGateway()->first()->additional_attr;

            app()->bind('paymentMethod',function() use($paymentGateway){

                $class = sprintf("App\\PaymentGateway\\%s",ucfirst($paymentGateway));
                if(is_a($class,PaymentGatewayInterface::class,true)){
                    return  new $class;
                }else{
                    throw new \Exception('invalid payment method');
                }
            });
        }

    }


}
