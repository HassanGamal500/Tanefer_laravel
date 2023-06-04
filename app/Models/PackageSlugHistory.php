<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageSlugHistory extends Model
{
    protected $fillable = [
        'slug','package_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
