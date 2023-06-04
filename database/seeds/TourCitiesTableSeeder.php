<?php

use Illuminate\Database\Seeder;
use App\Models\TourCity;

class TourCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Cairo'],
            ['name'=>'Giza'],
            ['name'=>'Luxor'],
            ['name'=>'Aswan'],
            ['name'=>'Sharm El Sheikh'],
            //...
        ];
        TourCity::insert($data);
    }
}
