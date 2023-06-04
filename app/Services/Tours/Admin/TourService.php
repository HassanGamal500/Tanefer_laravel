<?php


namespace App\Services\Tours\Admin;
use App\Models\Tour;
use App\Models\TourImage;
use App\Models\TourPlace;
use App\Models\TourExtraActivity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Exceptions\HttpResponseException;

class TourService
{
    public function all(){
        $tours = Tour::get();
        return $tours;
    }

    public function create($request){
        //upload image
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imgName = "tour-". time().".$ext";
        if($image->move(public_path('images/tours'),$imgName)){
            $tour = Tour::create([
                'name'  => $request->name,
                'duration' => $request->duration,
                'image' => $imgName,
                'meals' => $request->meals,
                'description' => $request->description
            ]);

            $tour->cities()->sync($request->city_ids);
            return $tour;
        }
    }

    public function find($id){
        $tour = Tour::find($id);
        return $tour;
    }

    public function update($request,$id){
        $tour = Tour::find($id);
        if(!$tour){
            return false;
        }

        $imageName = $tour->image;
        if($request->hasFile('image')){
            if($imageName!==null){
                Storage::disk('tours')->delete($imageName);
            }
            //upload image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = "tour-". time().".$ext";
            $image->move(public_path('images/tours'),$imageName);
        }
      
        $tourData =  $tour->update([
            'name'  => $request->name,
            'duration' => $request->duration,
            'image' => $imageName,
            'meals' => $request->meals,
            'description' => $request->description
        ]);

        $tour->cities()->sync($request->city_ids);
        return $tourData; 
    }

    public function delete($id){
        $tour = Tour::find($id);
        if(!$tour){
            return false;
        }
        
        $imageName = $tour->image;
        if($imageName !== null){
            Storage::disk('tours')->delete($imageName);
        }
        $tourData = $tour->delete();
        return $tourData;
    }

    public function addData($data,$col,$method){

        $tour_id = $data['tour_id'];
        $items = $data[$col];
        $tour = Tour::find($tour_id);

        foreach($items as $item){
            $input[] = [$col => $item];
        }
        
        $output = $tour->$method()->createMany($input);
        
        return $tour->$method;

    }

    public function addProgram($data){

        $tour_id = $data['tour_id'];
        $program = $data['program'];
        $tour = Tour::find($tour_id);
        //dd($program);
        foreach($program as $item){
            $title = $item['title'];
            foreach($item['schedule'] as $sch)
                $input[] = ['title' => $title,'schedule' => $sch];
        }
        
        $tourPlace = $tour->tourPrograms()->createMany($input);
        
        return $tour->tourPrograms;

    }

    public function addOptional($request){
        $tour_id = $request->tour_id;
        $optionals = $request->optionals;
        $tour = Tour::find($tour_id);

        foreach($optionals as $option){
            $imageName = '';
            // if($option->hasFile('image')){
            //     //upload image
            //     $image = $request->file('image');
            //     $ext = $image->getClientOriginalExtension();
            //     $imageName = "optional-". time().".$ext";
            //     $image->move(public_path('images/tours/tour_'.$tour_id),$imageName);
            // }

            $extraActivities = new TourExtraActivity;
            $extraActivities->tour_id = $tour_id;
            $extraActivities->title = $option['title'];
            $extraActivities->price = $option['price'];
            $extraActivities->image = $imageName;
            $extraActivities->duration = $option['duration'];
            $extraActivities->save();

        }
        return $tour->tourExtraActivities;

    }

    public function addPrices($data){

        $tour_id = $data['tour_id'];
        $prices = $data['prices'];
        $tour = Tour::find($tour_id);

        foreach($prices as $item){
            $input[] = ['numberOfPassenger' => $item['numberOfPassenger'],
                        'adult_price' => $item['adult_price'],
                        'child_price' => $item['child_price'],
                        'start_date' => $item['start_date'],
                        'end_date' => $item['end_date'],
                        'repeat' => $item['repeat'],
                        'room_type' => $item['room_type']
                    ];
        }
        
        $output = $tour->tourPrices()->createMany($input);
        
        return $tour->tourPrices;

    }

    public function addTourImages($request){

        $images = $request->file('image');//array of images
        $tour_id = $request->tour_id;
        $tour = Tour::find($tour_id);
        foreach($images as $image){
            //upload image
            $ext = $image->getClientOriginalExtension();
            $imageName = "tour-". uniqid().".$ext";
            if($image->move(public_path('images/tours/tour_'.$tour_id),$imageName)){
                $tourImages = new TourImage;
                $tourImages->tour_id = $tour_id;
                $tourImages->image = $imageName;
                $tourImages->save();
            }  

        }
        return $tour->tourImages;

    }

    public function allData($tour_id,$method){

        $tour = Tour::find($tour_id);
        if($tour){
            return $tour->$method;
        }else{
            throw new HttpResponseException(response()->json(['tour'=> [],'message' => "tour not found","errors" => []] ,404));
        }
    }

   public function updateData($data,$id,$model){

        $modelData = $model::find($id);
        if($modelData){
            $output =  $modelData->update($data);
            return (($output) ? $modelData: null);
        }else{
            throw new HttpResponseException(response()->json(['output'=> null,'message' => "Data not found","errors" => []], 404));
        }
   }

   public function deleteData($id,$model){

        $modelData = $model::find($id);
        if($modelData){
            $output =  $modelData->delete();
            return $output;
        }else{
            throw new HttpResponseException(response()->json(['output'=> null,'message' => "Data not found","errors" => []], 404));
        }

   }

   public function deleteImage($id){
        $tourImage = TourImage::find($id);
        if(!$tourImage){
            throw new HttpResponseException(response()->json(['output'=> null,'message' => "Data not found","errors" => []], 404));
        }
        
        $imageName = $tourImage->image;
        $tour_id = $tourImage->tour_id;
        if($imageName !== null){
            Storage::disk('tours')->delete('tour_'.$tour_id.'/'.$imageName);
        }
        $tourData = $tourImage->delete();
        return $tourData;
   }

   public function updateTourImage($request,$id){
        $tourImage = TourImage::find($id);
        if(!$tourImage){
            throw new HttpResponseException(response()->json(['output'=> null,'message' => "Data not found","errors" => []], 404));
        }

        $imageName = $tourImage->image;
        $tour_id = $tourImage->tour_id;
        if($request->hasFile('image')){
            if($imageName!==null){
                Storage::disk('tours')->delete('tour_'.$tour_id.'/'.$imageName);
            }
            //upload image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = "tour-". uniqid().".$ext";
            $image->move(public_path('images/tours/tour_'.$tour_id),$imageName);
        }
        
        $tourData =  $tourImage->update([
            'image' => $imageName,
        ]);
        return (($tourData) ? $tourImage: null);

   }
}