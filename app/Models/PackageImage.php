<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PackageImage extends Model
{
    protected $fillable = [
        'image' ,'sort', 'image_alt' , 'image_caption' , 'package_id'
    ];

    public function getImageAttribute()
    {
        return    URL::to('storage/' . $this->attributes['image']);
    }
}
