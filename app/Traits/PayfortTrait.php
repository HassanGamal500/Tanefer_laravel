<?php

namespace App\Traits;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use GuzzleHttp\Client;

trait PayfortTrait{

    public function getPayfortAmount($amount, $currency)
    {
        $decimals = data_get(array(
            'BHD' => 3,
            'IQD' => 3,
            'JOD' => 3,
            'KWD' => 3,
            'LYD' => 3,
            'OMR' => 3,
            'TND' => 3
        ), $currency, 2);

        return intval($amount * pow(10, $decimals));
    }
    
    public function calcPayfortSignature(array $params, $signature_type = 'request')
    {
        # Steps as listed in payfort documentation
        # 1
        ksort($params);
        # 2
        $combined_params = array_map(function ($k, $v) use($signature_type){
            if($signature_type == 'request'){
                if($k == 'signature' || $k == 'expiry_date' || $k == 'card_number' || $k == 'card_security_code' || $k == 'card_holder_name'){
                    return '';
                }else{
                    return "$k=$v";
                }
            }else{
                return $k == 'signature' ? '' : "$k=$v";
            }   
            
        }, array_keys($params), array_values($params));
        # 3
        $joined_parameters = join('', $combined_params);
        # 4
       // $salt = data_get($this->config, ($signature_type == 'response' ? 'sha_response_phrase' : 'sha_request_phrase'));
       $salt = ($signature_type == 'response' ? $this->SHAResponsePhrase : $this->SHARequestPhrase);
        $signature = sprintf('%s%s%s', $salt, $joined_parameters, $salt);
        # 5
        $signature = hash($this->SHAType, $signature);

        return $signature;
        
    }

    public function generateMerchantReference()
    {
        return rand(0, getrandmax());
    }

    public function formateDate($data){
        return Carbon::createFromFormat('Y-m', $data)->format('ym');
 
     }

     public function callPayfortAPI($data)
    {
        $data['signature'] = $this->calcPayfortSignature($data, 'request');
        try {
            # Make http request
            $Client = new Client([
                'curl' => [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CONNECTTIMEOUT => false
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ],
            ]);
            $rawResponse = $Client->post($this->payfortEndpoint.'/FortAPI/paymentApi', [
                'json' => $data
            ])->getBody();

            $response = json_decode($rawResponse);
            
            if (data_get($response, 'status') == '00') {
                throw new HttpResponseException(
                    apiResponse([],data_get($response, 'response_message'),false)
                    //response()->json(['message'=> data_get($response, 'response_message')])
                );
               
            }

            # Verify response signature
            if (data_get($response, 'signature') != $this->calcPayfortSignature(((array)$response), 'response')) {
                throw new HttpResponseException(
                    apiResponse([],'Payfort response signature mismatched',false)
                    //response()->json(['message' => 'Payfort response signature mismatched'])
                );
            }
            return $response;

        } catch (\Exception $e) {
            throw new HttpResponseException(
                response()->json(['message' => $e->getMessage()])
            );
            
        }
    }
}