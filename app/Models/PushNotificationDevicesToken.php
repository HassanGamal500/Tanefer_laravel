<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushNotificationDevicesToken extends Model
{
    protected $fillable = [
        'token','last_activity'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'push_notification_device_token_user',
        'devices_token_id','user_id');
    }
}
