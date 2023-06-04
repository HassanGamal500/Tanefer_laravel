<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    protected $fillable = [
        'to', 'cc', 'client_id'
    ];

    protected $with = ['client'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
