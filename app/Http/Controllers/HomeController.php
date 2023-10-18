<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function payment(Request $request) {
        if(Cache::has($request->sessionId)){
            $cachedTotalPrice = Cache::get($request->sessionId);
            if($cachedTotalPrice['totalPrice'] != $request->price){
                return responseJson($request,new \stdClass(),
                    'Package Total Price not valid, Valid price is '.$cachedTotalPrice,422);
            }
        }else{
            return responseJson($request,new \stdClass(),'Something wrong in total price',422);
        }

        if (isset($request->final_price) && $request->final_price > 0) {
            $getPrice = $request->final_price;
        } else {
            $getPrice = $request->get('price');
        }

        $requestParams = array(
            'command' => 'PURCHASE',
            'access_code' => config('services.payfort.access_code'),
            'merchant_identifier' => config('services.payfort.merchant_identifier'),
            'merchant_reference' => 'TANEFER-' . rand('1000000000', '9999999999'),
            'amount' => $getPrice * 100,
            'currency' => 'USD',
            'language' => 'en',
            'customer_email' => $request->email ?? 'admin@tanefer.com',
            'return_url' => $request->url,
            'merchant_extra' => $request->bookingId
        );

        $shaString  = '';

        // sort an array by key
        ksort($requestParams);
        foreach ($requestParams as $key => $value) {
            $shaString .= "$key=$value";
        }
        // make sure to fill your sha request pass phrase
        //$shaString = "*tanefarlive123RQ" . $shaString . "*tanefarlive123RQ"; //live
        $shaString =  config('services.payfort.sha_phrase') . $shaString . config('services.payfort.sha_phrase'); //test


        $signature = hash("sha256", $shaString);
        // your request signature
        $requestParams['signature'] = $signature;


        //$redirectUrl = 'https://checkout.payfort.com/FortAPI/paymentPage'; //live
        $redirectUrl = config('services.payfort.redirect_url'); //test
        echo "<html xmlns='https://www.w3.org/1999/xhtml'>\n<head></head>\n<body>\n";
        echo "<form action='$redirectUrl' method='post' name='frm'>\n";
        foreach ($requestParams as $a => $b) {
            echo "\t<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>\n";
        }
        echo "\t<script type='text/javascript'>\n";
        echo "\t\tdocument.frm.submit();\n";
        echo "\t</script>\n";
        echo "</form>\n</body>\n</html>";
    }
}
