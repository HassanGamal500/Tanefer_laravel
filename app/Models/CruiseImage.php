<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class CruiseImage extends Model
{

    protected $fillable = ['image','cruise_id'];

    public function getImageAttribute()
    {
        return    URL::to('storage/' . $this->attributes['image']);
    }
}
