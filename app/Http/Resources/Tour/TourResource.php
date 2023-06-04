<?php

namespace App\Http\Resources\Tour;

use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       $data = $this->_getTourPrices($this->tourPrices);
       //print_r($this->tourPrices);die;
        return [
            "id" => $this->id,
            "title" => $this->name,
            "destination" => $this->_getData($this->cities,"name"),
            "rating" => $this->rating,
            "photo" => asset('images/tours/'.$this->image),
            "duration" => $this->duration,
            "adult_price" => $data['adult_price'],
            "child_price" => $data['child_price'],
            "start_date" => $data['start_date'],
            "end_date" => $data['end_date'],
            "minimumNumberOfPassenger" => $data['min_numberOfPassenger'],
            "tour_extra_activities" => ExtraActivitiesResource::collection($this->tourExtraActivities)
        ];
    }

    private function _getData($dataCollection,$col){
        $data =[];
        if($dataCollection){
            foreach($dataCollection as $item){
                $data[] = $item->$col;

            }
        }
        return $data;

    }

    private function _getTourPrices($tourPrices){

        if(!$tourPrices->isEmpty()){
            $data['adult_price'] = $tourPrices[0]->adult_price;
            $data['child_price'] = $tourPrices[0]->child_price;
            $data['start_date'] = (($tourPrices[0]->start_date) ?? $tourPrices[0]->repeat);
            $data['end_date'] = $tourPrices[0]->end_date;
            $data['min_numberOfPassenger'] = $tourPrices[0]->numberOfPassenger;
        }else{
            $data['adult_price'] = $data['child_price'] = $data['min_numberOfPassenger'] = 0;
            $data['start_date'] = $data['end_date'] = null;
        }

        return $data;
    }

    
}
