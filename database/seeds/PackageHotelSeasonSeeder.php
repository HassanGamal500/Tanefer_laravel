<?php

use Illuminate\Database\Seeder;

class PackageHotelSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PackageHotelSeason::class , 10)->create();
    }
}
