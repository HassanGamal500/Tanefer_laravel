<?php

namespace App\Http\Controllers\ApiV1\User;

use App\Http\Controllers\Controller;
use App\Models\PushNotificationDevicesToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PushNotificationToken extends Controller
{
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'token' => 'required|unique:push_notification_devices_tokens,token'
        ]);

        if($validate->fails()){
            return apiResponse('',implode(',',$validate->errors()->all()),false);
        }

        PushNotificationDevicesToken::create([
            'token' => $request->token,
            'last_activity' => now()
        ]);

        return apiResponse('','Token Saved',true);
    }
}
