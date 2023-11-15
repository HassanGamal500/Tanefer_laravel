<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CruiseChildrenPackage extends Model
{
    protected $table = 'cruise_children_packages';
    protected $fillable = [
        'min',
        'max',
        'children_Percentage',
        'cruise_id',
        'package_hotel_room_id',
        'package_hotel_season_id'
    ];

    protected $with = ['packageHotelRoomSeason'];

    public function packageHotelRoomSeason()
    {
        return $this->hasMany(PackageHotelRoomSeason::class,'package_hotel_room_id','id');
    }


    public function packageHotelRoom(){
        return $this->belongsTo(PackageHotelRoom::class,'package_hotel_room_id');
    }
    public function packageHotelSesson(){
        return $this->belongsTo(PackageHotelSeason::class,'package_hotel_season_id');
    }
    public function cruise(){
        return $this->belongsTo(Cruise::class,'cruise_id');
    }

}
