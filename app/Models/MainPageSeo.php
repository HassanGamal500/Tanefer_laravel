<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainPageSeo extends Model
{
    protected $table = 'main_page_seos';
    protected $fillable = [
        'page_name',
        'seo_title',
        'seo_description',
        'featured_image',
        'slug',
    ];

}
