<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PackageImage extends Model
{
    protected $fillable = [
        'image' , 'image_alt' , 'image_caption' , 'sort', 'package_id'
    ];

    public function getImageAttribute()
    {
        return    URL::to('storage/' . $this->attributes['image']);
    }
}
