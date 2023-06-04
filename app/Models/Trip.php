<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'title','image','destination'
    ];

    protected $casts = [
        'link' => 'json'
    ];
}
