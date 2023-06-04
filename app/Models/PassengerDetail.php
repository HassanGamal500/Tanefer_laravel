<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassengerDetail extends Model
{
    protected $fillable = [
        'passenger_name','passport_number','passport_expire_date','passport_issue_country','pnr_id','date_of_birth'
    ];


    public function pnr()
    {
        return $this->belongsTo(Pnr::class);
    }

}
