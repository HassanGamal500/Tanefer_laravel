<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APIToken extends Model
{
    protected $fillable= [
        'token','api_type','token_type','expire_at'
    ];
}
