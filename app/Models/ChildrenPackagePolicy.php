<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildrenPackagePolicy extends Model
{
    protected $fillable = ['package_id','children_percentage'];

}
