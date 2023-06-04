<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
      'name','url','client_id','email','terms_url','block','phone','currency'
    ];

    protected $with = ['thirdPartyAccounts','profitSettings','emailSetting','flightsPromotions'];

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function thirdPartyAccounts()
    {
        return $this->belongsToMany(ThirdPartyAccount::class)->without('clients');
    }


    public function hotelBookings()
    {
        return $this->hasMany(HotelBooking::class);
    }

    public function pnrs()
    {
        return $this->hasMany(Pnr::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function emailSetting()
    {
        return $this->hasOne(EmailSetting::class)->without('client');
    }

    public function parentClient()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function profitSettings()
    {
        return $this->hasMany(ProfitSetting::class);
    }

    public function flightsPromotions()
    {
        return $this->hasMany(FlightsPromotion::class);
    }


}
