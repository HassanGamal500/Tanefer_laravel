<?php

namespace App\Http\Controllers\ApiV1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Client;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        //$client = resolve('client');
        //$mainClient = $client->parentClient ?? $client;

        $mainClient  = Client::find(23);

        $validate = Validator::make($request->all() , [
            'email' => 'required|string|email'
        ]);
        if($validate->fails()){
            return apiResponse(new \stdClass(),implode(',',$validate->errors()->all()),false);
        }

        $user = User::where('email',$request->email)->where('client_id',$mainClient->id)->first();

        if(is_null($user)){
            return apiResponse(new \stdClass(),'We can\'t find a user with that e-mail address.',false);
        }
        $token = rand(1000,9999);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Hash::make($token)
            ]
        );

        if($user && $passwordReset){
            $user->notify(
                new PasswordResetRequest($token,explode(',',$mainClient->url)[0])
            );
        }

        return apiResponse(new \stdClass(),'We have e-mailed your password reset link!',true);

    }

    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */

    public function reset(Request $request)
    {
        //$client = resolve('client');
        //$mainClient = $client->parentClient ?? $client;

        $mainClient  = Client::find(23);

        $validate = Validator::make($request->all(),[
           'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:8|max:100',
            'token'    => 'required|string'
        ]);
        if($validate->fails()){
            return apiResponse(new \stdClass(),implode(',',$validate->errors()->all()),false);
        }

        $user = User::where('email', $request->email)->where('client_id',$mainClient->id)->first();
        if(is_null($user)){
            return apiResponse(new \stdClass(),'We can\'t find a user with that e-mail address.',false);
        }

        $passwordReset = PasswordReset::where('email', $request->email)->first();

        if(is_null($passwordReset) && ! Hash::check($request->token,$passwordReset->token)){
            return apiResponse(new \stdClass(),'This password reset token is invalid.',false);
        }

        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();

        $senderName = $mainClient->name ?? 'fare33';
        $from = $mainClient->email ?? 'info@fare33.com';

        $user->notify(new PasswordResetSuccess($from,$senderName,explode(',',$mainClient->url)[0]));

        return apiResponse(new UserResource($user),'You are changed your password successful',true);
    }
}
