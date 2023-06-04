<?php

use App\Models\TourInclusion;
use Illuminate\Database\Seeder;

class TourInclusionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tour_id' => 1, 'details' => 'Return Transfers'],
            ['tour_id' => 1, 'details' => 'Area Ticket'],
            ['tour_id' => 1, 'details' => 'A/C Vehicle'],
            ['tour_id' => 1, 'details' => 'Tour Guide'],
            
        ];
        TourInclusion::insert($data);
    }
}
