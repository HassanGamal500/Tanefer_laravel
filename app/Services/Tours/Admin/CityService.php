<?php


namespace App\Services\Tours\Admin;
use App\Models\TourCity;
use App\Services\StoreFileService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CityService
{
    public function all()
    {
        $cities = TourCity::get();
        return $cities;
    }

    public function create(array $data)
    {
        return TourCity::create([
            "name" => $data['name'],
            'seo_title' => $data['seo_title'],
            'seo_description' => $data['seo_description'],
            'slug' => Str::slug($data['name']),
            'airport_code' => array_key_exists('airportCode',$data) ? $data['airportCode'] : null,
            'description'  => array_key_exists('description',$data) ? $data['description'] : null,
            'image_alt'    => array_key_exists('image_alt',$data) ? $data['image_alt'] : null,
            'image_caption'    => array_key_exists('image_caption',$data) ? $data['image_caption'] : null,
            'image'            => array_key_exists('image',$data) ? StoreFileService::SaveFile('cities',$data['image'],$data['name']) : null,
            'featured_image'            => array_key_exists('featured_image',$data) ? StoreFileService::SaveFile('cities',$data['featured_image'],$data['name']) : null,
        ]);
    }

    public function find($id)
    {
        $city = TourCity::find($id);
        return $city;
    }

    public function update(array $data,$id)
    {
        $city = TourCity::find($id);
        if(!$city){
            return false;
        }

        $cityData = $city->update([
            'name' => $data['name'],
            'seo_title' => $data['seo_title'] ?? null,
            'seo_description' => $data['seo_description'] ?? null,
            'slug' =>  isset($data['slug']) && $data['slug'] !== $city->slug ? $data['slug'] : Str::slug($data['name']),
            'airport_code' => array_key_exists('airport_code',$data) ? $data['airport_code'] : $city->airport_code,
            'description'  => array_key_exists('description',$data) ? $data['description'] : $city->description,
            'image_alt'    => array_key_exists('image_alt',$data) ? $data['image_alt'] : $city->image_alt,
            'image_caption'    => array_key_exists('image_caption',$data) ? $data['image_caption'] : $city->image_caption,
        ]);

        if(array_key_exists('image',$data)){
            $cityData = $city->update([
                'image'            => StoreFileService::SaveFile('cities',$data['image'],$data['name'])
            ]);
        }
        if(array_key_exists('featured_image',$data)){
            $cityData = $city->update([
                'featured_image'            => StoreFileService::SaveFile('cities',$data['featured_image'],$data['name'])
            ]);
        }
        return $cityData;// true / false

    }

    public function delete($id)
    {
        $city = TourCity::find($id);
        if(!$city){
            return false;
        }
        $cityArray = (array)DB::table('tour_cities')->find($id);

        Storage::delete($cityArray['image']);
        Storage::delete($cityArray['featured_image']);

        $cityData = $city->delete();
        return $cityData;
    }
}
