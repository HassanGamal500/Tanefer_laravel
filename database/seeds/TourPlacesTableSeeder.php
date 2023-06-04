<?php

use Illuminate\Database\Seeder;
use App\Models\TourPlace;

class TourPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tour_id' => 1, 'place' =>'the Hanging Church'],
            ['tour_id' => 1, 'place' =>'the Holy Cavern Church'],
            ['tour_id' => 1, 'place' =>'Ben Ezra Synagogue'],
            ['tour_id' => 2, 'place' =>'River Nile'],
            
        ];
        TourPlace::insert($data);
    }
}
