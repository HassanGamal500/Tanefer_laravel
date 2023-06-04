<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteSEOData extends Model
{
    protected $fillable = [
        'route' , 'seo_title','meta_description'
    ];
}
