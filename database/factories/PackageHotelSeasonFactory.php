<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PackageHotelSeason;
use Faker\Generator as Faker;

$factory->define(PackageHotelSeason::class, function (Faker $faker) {
    return [
        'start_date'    =>  $faker->date('Y-m-d', '2022-1-1'),
        'end_date'      =>  $faker->date('Y-m-d','2022-12-30'),
    ];
});
