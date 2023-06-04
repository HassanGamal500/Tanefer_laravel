<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StartDay extends Model
{
    protected $fillable = [
      'day_of_week',
      'model_type',
      'model_id'
    ];

}
