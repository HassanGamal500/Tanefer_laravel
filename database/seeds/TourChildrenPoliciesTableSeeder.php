<?php

use Illuminate\Database\Seeder;
use App\Models\TourChildrenPolicy;
class TourChildrenPoliciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tour_id' => 1 ,'policy' => '50% Discount'],

            ['tour_id' => 2 ,'policy' => '00% Discount'],

            ['tour_id' => 3 ,'policy' => '50% Discount'],
            
        ];
        TourChildrenPolicy::insert($data);
    }
}
