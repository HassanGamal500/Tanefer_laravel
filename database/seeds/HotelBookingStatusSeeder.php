<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HotelBookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\HotelBookingStatus::truncate();

        $statuses = [
             'Cancelled',
             'Cancelled From the Customer',
             'Confirmed',
             'Vouchered',
             'Void',
             'Pending'
        ];

        foreach ($statuses as $status){
            \App\Models\HotelBookingStatus::create(['name' => $status]);
        }
    }
}
