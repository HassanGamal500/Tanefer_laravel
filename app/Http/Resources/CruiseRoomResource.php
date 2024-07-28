<?php

namespace App\Http\Resources;

use App\Models\PackageHotelRoomSeason;
use App\Models\CruiseChildrenPackage;
use Illuminate\Http\Resources\Json\JsonResource;

class CruiseRoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'requests' => $request->all(),
            'type' => $this->type,
            'room_number' => $this->room_number,
            'occupancy' => $this->occupancy,
            'inclusions' => $this->inclusions,
            'amenities'  => $this->amenities,
            'adults' => $this->adults,
            'children' => $this->children,
            'child_ages' => $this->child_ages,
            'max_num_adult' => $this->max_num_adult,
            'max_num_children' => $this->max_num_children,
            'categories' => $this->categories,
            // 'price_per_day' => $this->packageHotelRoomSeason()->where('start_date', '<=',$request->start_date)->first()->price_per_day ?? 0
            'price' => $this->packageHotelRoomSeason()->where('start_date', '<=',$request->start_date)->first()->price_per_day ?? 0,
            'price_per_day' => $this->getPricePerDay($this->id, $this->adults, $this->children, $this->child_ages, $request->all())
        ];
    }
    
    private function getPricePerDay($roomId, $adults, $children, $child_ages, $request)
    {
        $date = $request['start_date'];
        $cruiseId = $request['cruise_id'];
        $adult_price = 0;
        $child_price = 0;
        
        $cruise_price = PackageHotelRoomSeason::select('id', 'price_per_day', 'start_date', 'end_date')
            ->where('package_hotel_room_id', $roomId)
            ->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)
            ->orderBy('price_per_day', 'ASC')
            ->first();
            
        if($cruise_price) {
            $adult_price += (int)$adults * $cruise_price->price_per_day;
        
            if(isset($child_ages) && count($child_ages) > 0) {
                foreach($child_ages as $age) {
                    $children_cruise = CruiseChildrenPackage::where('cruise_id', $cruiseId)
                        ->where('package_hotel_room_id', $roomId)
                        ->where('min', '<=', $age['age'])
                        ->where('max', '>=', $age['age'])
                        ->orderBy('children_Percentage', 'ASC')
                        ->first();
                    if(isset($children_cruise)) {
                        $child_price += $cruise_price->price_per_day * $children_cruise->children_Percentage / 100;
                    }
                }
            }
        }
        
        return $adult_price + $child_price;
        // return $cruise_price;
    }
}
