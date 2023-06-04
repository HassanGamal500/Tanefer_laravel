<?php

use Illuminate\Database\Seeder;
use App\Models\TourPolicy;

class TourPoliciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tour_id' => 1, 'inclusions' => 'Return Transfers, Area Ticket, A/C Vehicle, Tour Guide','exclusions' => 'Coptic Museum Entry Ticket, Camera Tickets, Lunch meal, Tipping'],

            ['tour_id' => 2, 'inclusions' => 'Return Transfers, Open Buffet Dinner, A/C Vehicle, Tour Guide','exclusions' => 'Bevrage during the meal, Photography on board, Tipping'],
            
            ['tour_id' => 3, 'inclusions' => 'Return Transfers, Entry Ticket, A/C Vehicle, Tour Guide','exclusions' => 'Camera Tickets, Lunch meal, Tipping'],
            
        ];
        TourPolicy::insert($data);
    }
}
