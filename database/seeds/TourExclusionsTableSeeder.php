<?php

use App\Models\TourExclusion;
use Illuminate\Database\Seeder;

class TourExclusionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tour_id' => 1, 'details' => 'Coptic Museum Entry Ticket'],
            ['tour_id' => 1, 'details' => 'Camera Tickets'],
            ['tour_id' => 1, 'details' => 'Lunch meal'],
            ['tour_id' => 1, 'details' => 'Tipping'],
        ];
        TourExclusion::insert($data);
    }
}
