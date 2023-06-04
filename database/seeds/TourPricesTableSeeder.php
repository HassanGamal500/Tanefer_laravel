<?php

use Illuminate\Database\Seeder;
use App\Models\TourPrice;

class TourPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tour_id' => 1,'numberOfPassenger' => 1,'adult_price' => 80,'child_price' => 40 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 1,'numberOfPassenger' => 2,'adult_price' => 40,'child_price' => 20,'repeat' => 'Daily Tour'],
            ['tour_id' => 1,'numberOfPassenger' => 3,'adult_price' => 40,'child_price' => 20,'repeat' => 'Daily Tour'],
            ['tour_id' => 1,'numberOfPassenger' => 4,'adult_price' => 40,'child_price' => 20,'repeat' => 'Daily Tour'],
            ['tour_id' => 1,'numberOfPassenger' => 5,'adult_price' => 35,'child_price' => 17.5,'repeat' => 'Daily Tour'],
            ['tour_id' => 1,'numberOfPassenger' => 6,'adult_price' => 35,'child_price' =>17.5 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 1,'numberOfPassenger' => 7,'adult_price' => 35,'child_price' => 17.5,'repeat' => 'Daily Tour'],
            ['tour_id' => 1,'numberOfPassenger' => 8,'adult_price' => 35,'child_price' => 17.5,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 1,'adult_price' => 120,'child_price' => 120 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 2,'adult_price' => 60,'child_price' =>60 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 3,'adult_price' => 60,'child_price' => 60,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 4,'adult_price' => 60,'child_price' => 60,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 5,'adult_price' => 55,'child_price' => 55,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 6,'adult_price' => 55,'child_price' => 55,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 7,'adult_price' => 55,'child_price' => 55,'repeat' => 'Daily Tour'],
            ['tour_id' => 2,'numberOfPassenger' => 8,'adult_price' => 55,'child_price' =>55 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 1,'adult_price' => 90,'child_price' => 45,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 2,'adult_price' => 45,'child_price' => 22.5,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 3,'adult_price' => 45,'child_price' =>22.5 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 4,'adult_price' => 45,'child_price' =>22.5 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 5,'adult_price' => 40,'child_price' => 20,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 6,'adult_price' => 40,'child_price' =>20 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 7,'adult_price' => 40,'child_price' =>20 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 3,'numberOfPassenger' => 8,'adult_price' => 40,'child_price' => 20,'repeat' => 'Daily Tour'],
            ['tour_id' => 4,'numberOfPassenger' => 1,'adult_price' => 80,'child_price' =>40 ,'repeat' => 'Daily Tour'],
            ['tour_id' => 4,'numberOfPassenger' => 2,'adult_price' => 45,'child_price' => 22.5,'repeat' => 'Daily Tour'],
 
        ];
        TourPrice::insert($data);
    }
}
