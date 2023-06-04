<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageActivitySideActivity extends Model
{
    protected $guarded = [] ;

    public function packageActivity(){
        return $this->belongsTo(PackageActivity::class,'package_activity_id');

    }
}
