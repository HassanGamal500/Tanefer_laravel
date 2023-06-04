<?php

namespace App\Http\Resources\Tour;

use Illuminate\Http\Resources\Json\JsonResource;

class TourDetailsResource extends JsonResource
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
        return [
            "id" => $this->id,
            "title" => $this->name,
            "destination" => $this->_getData($this->cities,"name"),
            "rating" => $this->rating,
            "photo" => asset('images/tours/'.$this->image),
            "duration" => $this->duration,
            "price" =>  $data['adult_price'],
            "start_date" => $data['start_date'],
            "end_date" => $data['end_date'],
            "minimumNumberOfPassenger" => $data['min_numberOfPassenger'],
            "meals" => $this->meals,
            "description" => $this->description,
            "tour_children_policies" => $this->_getData($this->tourChildrenPolicies,"policy"),
            "tour_extra_activities" =>  ExtraActivitiesResource::collection($this->tourExtraActivities),
            "tour_images" =>  $this->_getData($this->tourImages,"image"),
            "tour_places" => $this->_getData($this->tourPlaces,"place"),
            "tour_prices" => $this->tourPrices,
            "tour_programs" => $this->_gettourPrograms($this->tourPrograms),
            "tour_services" => $this->_getData($this->tourServices,"service"),
            "tour_policy_inclusion" => $this->_getData($this->tourInclusions,"details"),
            "tour_policy_exclusion" => $this->_getData($this->tourExclusions,"details")
        ];
    }

    private function _getData($dataCollection,$col){
        $data =[];
        if($dataCollection){
            foreach($dataCollection as $item){
                if($col == "image"){
                    $data[] = asset('images/tours/tour_'.$item->tour_id.'/'.$item->$col);
                }else{
                    $data[] = $item->$col;
                }
                

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

    private function _gettourPrograms($tourPrograms){
        $result=$data =[];
        foreach($tourPrograms as $item){
           $data[$item->title][] = $item->schedule;
        }

        if($data){
            foreach($data as $key => $value){
                $result[] =  [
                    "title" => $key,
                    "schedule" => $value
                ];
    
            }

        }
        
        return $result;
    }

}
