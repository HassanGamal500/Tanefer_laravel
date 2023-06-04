<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThirdPartyAccount extends Model
{
    protected $fillable = [
        'username','password','additional_attr','rest_url','soap_url','third_party_type','token','token_expire_at'
    ];


    public function clients()
    {
        return $this->belongsToMany(Client::class,'client_third_party_account','third_party_account_id',
            'client_id');
    }

    public function scopeSabre($q)
    {
        return $q->where('third_party_type','sabre');
    }

    public function scopeTbo($q)
    {
        return $q->where('third_party_type','tbo');
    }

    public function scopePaymentGateway($q)
    {
        return $q->where('third_party_type','paymentGateway');
    }

    public function scopePaymentMethod($query, $method)
    {
        return $query->where('additional_attr', $method);
    }
}
