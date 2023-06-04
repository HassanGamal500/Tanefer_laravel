<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourProgram extends Model
{
    protected $fillable = ['tour_id','title','schedule'];
    
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }
}
