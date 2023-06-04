<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectPoint extends Model
{
    protected $fillable = [
        'user_id',
        'points',
        'reason',
        'model_type',
        'model_id'
    ];

    protected $with = ['booking'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->morphTo('','model_type','model_id');
    }
}
