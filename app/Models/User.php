<?php

namespace App\Models;

use App\Notifications\VerifyApiEmail;
use App\Notifications\VerifyEmailApi;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail,JWTSubject
{
    use HasApiTokens, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','code','available_points','client_id',
        'block','registered_from_id','device_token', 'username', 'type'
    ];

    protected $with = ['roles'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pnrs()
    {
        return $this->hasMany(Pnr::class);
    }

    public function hotelBookings()
    {
        return $this->hasMany(HotelBooking::class);
    }


    public function sendApiEmailVerificationNotification($code,$from,$senderName,$appUrl)
    {
        $this->notify(new VerifyEmailApi($code,$from,$senderName,$appUrl)); // my notification
    }

    public function collectPoints()
    {
        return $this->hasMany(CollectPoint::class);
    }

    public function redeemPoints()
    {
        return $this->hasMany(RedeemPoint::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function registeredFrom()
    {
        return $this->belongsTo(Client::class,'registered_from_id','id');
    }

    public function notificationTokens()
    {
        return $this->belongsToMany(PushNotificationDevicesToken::class,'push_notification_device_token_user',
        'user_id','devices_token_id');
    }

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
