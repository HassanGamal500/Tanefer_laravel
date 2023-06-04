<?php

use Illuminate\Database\Seeder;
use App\Models\TourExtraActivity;

class TourExtraActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['tour_id' => 4, 'title' => "Camel Ride",'price' => 0,'image' => 'image.jpg','duration' => "30 Minutes" ],
            ['tour_id' => 4, 'title' => "Horse Ride",'price' => 0,'image' => 'image.jpg','duration' => "1 Hour" ],
            ['tour_id' => 4, 'title' => "Sound & Lights Show at Giza Pyramids at night",'price' => 0,'image' => 'image.jpg','duration' => "1 Hour" ],
            
            
        ];
        TourExtraActivity::insert($data);
    }
}
