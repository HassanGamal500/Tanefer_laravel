<?php

namespace App\Http\Controllers\ApiV1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Jobs\SendMailWhenSubAgentRegisteredJob;
use App\Models\Client;
use App\Models\LoyaltyProgramSetting;
use App\Models\User;
use Propaganistas\LaravelPhone\PhoneNumber;

class RegisterController extends Controller
{
    public function create(RegisterRequest $request)
    {

        //$client  = resolve('client');
        //$mainClient = $client->parentClient ?? $client;
        $mainClient = $client = Client::find(21);
        $code = rand(1000, 9999);
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'phone'    => PhoneNumber::make($request->phone)->ofCountry($request->countryIsoCode)
                ->formatInternational(),
            'device_token' => $request->device_token,
            'code'     => $code,
            'client_id'=> $mainClient->id,
            'registered_from_id' => $client->id
        ]);


        if($client->name == 'Atsfares'){
            $user->assignRole('ats_subAgent');
            $user->update(['block' => 1]);

            dispatch(new SendMailWhenSubAgentRegisteredJob($user->toArray(),$client->toArray()))->delay(5);
        }else{
            $user->assignRole('customer');
            $this->addPointsToRegisteredUser($user);
        }


        if(! app()->environment('local')){
             $senderName = $mainClient->name ?? 'fare33';
             $from = $mainClient->email ?? 'info@fare33.com';
            $user->sendApiEmailVerificationNotification($code,$from,$senderName,explode(',',$mainClient->url)[0]);
        }

        return apiResponse(
            new UserResource($user),
            'Please confirm your Email by write verification code sent to your email',
        true);
    }

    public function addPointsToRegisteredUser($user)
    {
        $points = LoyaltyProgramSetting::where('type','register')->first();

        if($points != null){
            $user->available_points = is_null($points->number) ? 0 : $points->number;
            $user->update();
        }
    }

}
