<?php

namespace App\Http\Controllers\ApiV1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyRequest;
use App\Http\Resources\UserResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

    /**
     * Show the email verification notice.
     *
     */
    public function show()
    {
//
    }
    /**
     * Mark the authenticated user’s email address as verified.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function verify(VerifyRequest $request)
    {
       // $client = resolve('client');
        //$mainClient = $client->parentClient ?? $client;

        $mainClient = $client = Client::find(23);

        $userEmail = $request->email;
        $user = User::where('email',$userEmail)->where('client_id',$mainClient->id)->first();
        $date = date('Y-m-d g:i:s');

        if(is_null($user)){
            return apiResponse(new \stdClass(),'This Email not in our database',false);
        }

        if($user->code == $request->code){
            $user->email_verified_at = $date; // to enable the “email_verified_at field of that user be a current time stamp by mimicing the must verify email feature
            $user->save();
            if($client->name == 'Atsfares'){
                return apiResponse(new UserResource($user) , 'Email verified, Wait until Admin activate your account to login',true);
            }else{
                if($mainClient->name == 'Adam Travel'){

                }
                return apiResponse(new UserResource($user) , 'Email verified, Now you can login',true);
            }

        }else{
            return apiResponse(new \stdClass(),'Verification code not valid',false);
        }
    }

    /**
     * Resend the email verification notification.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function resend(Request $request)
    {
        $client = resolve('client');
        $mainClient = $client->parentClient ?? $client;

        $user = User::where('email',$request->email)->where('client_id',$mainClient->id)->first();
        if(is_null($user)){
            return apiResponse(new \stdClass(),'You do not register yet',false);
        }
        if ($user->hasVerifiedEmail()) {
            return apiResponse(new \stdClass(),'Your email already verified',false);
        }

        $senderName = $mainClient->name ?? 'fare33';
        $from = $mainClient->email ?? 'info@fare33.com';

        $code = rand(1000, 9999);
        $user->update(['code' => $code]);
        $user->sendApiEmailVerificationNotification($code,$from,$senderName,explode(',',$mainClient->url)[0]);

        return apiResponse(new \stdClass(),'verification code resend to your email',true);
    }
}
