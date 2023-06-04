<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourChildrenPolicy extends Model
{
    protected $fillable =['tour_id','policy'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }
}
