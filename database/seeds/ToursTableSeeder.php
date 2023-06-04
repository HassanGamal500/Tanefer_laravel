<?php

use Illuminate\Database\Seeder;
use App\Models\Tour;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Coptic Cairo','city_id' => 1,'duration' => 'Half Day' ,'image' => 'image.jpg','description' => 'Our tour guide will pick up, drive to Coptic Cairo, Visit the Hanging Church, the Holy Cavern Church, Ben Ezra Synagogue & Transfer back to your hotel in Cairo / Giza'],

            ['name' => 'Dinner Cruise','city_id' => 1,'duration' => 'Half Day' ,'image' => 'image.jpg','description' => 'Our tour guide will pick you up, drive you to the River Nile, Check in, Enjoy Egyptian Dinner, Belly Dance, Whirling Dervish Show & Music Band in the evening & Transfer back to your hotel in Cairo / Giza'],

            ['name' => 'Egyptian Museum','city_id' => 1,'duration' => 'Half Day' ,'image' => 'image.jpg','description' => 'Our tour guide will pick up, drive to the Egyptian Museum, Start a guided tour throughout the Egyptian Museum & Transfer back to your hotel in Cairo / Giza'],
            
        ];
        Tour::insert($data);
    }
}
