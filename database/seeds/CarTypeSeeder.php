<?php

use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\CarCategory::truncate();
        \App\Models\CarType::truncate();
        \App\Models\CarTransDrive::truncate();
        \App\Models\CarAirconFuel::truncate();


        \App\Models\CarCategory::insert([
            [
                'code' => 'M',
                'name' => 'Mini'
            ],
            [
                'code' => 'N',
                'name' => 'Mini Elite'
            ],
            [
                'code' => 'E',
                'name' => 'Economy'
            ],
            [
                'code' => 'H',
                'name' => 'Economy Elite'
            ],
            [
                'code' => 'C',
                'name' => 'Compact'
            ],
            [
                'code' => 'D',
                'name' => 'Compact Elite'
            ],
            [
                'code' => 'I',
                'name' => 'Intermediate'
            ],
            [
                'code' => 'J',
                'name' => 'Intermediate Elite'
            ],
            [
                'code' => 'S',
                'name' => 'Standard'
            ],
            [
                'code' => 'R',
                'name' => 'Standard Elite'
            ],
            [
                'code' => 'F',
                'name' => 'Fullsize'
            ],
            [
                'code' => 'G',
                'name' => 'Fullsize Elite'
            ],
            [
                'code' => 'P',
                'name' => 'Premium'
            ],
            [
                'code' => 'U',
                'name' => 'Premium Elite'
            ],
            [
                'code' => 'L',
                'name' => 'Luxury'
            ],
            [
                'code' => 'W',
                'name' => 'Luxury Elite'
            ],
            [
                'code' => 'O',
                'name' => 'Oversize'
            ],
            [
                'code' => 'X',
                'name' => 'Special'
            ],
        ]);

        \App\Models\CarType::insert([
            [
                'code' => 'B',
                'name' => '2-3 Door'
            ],
            [
                'code' => 'C',
                'name' => '2/4 Door'
            ],
            [
                'code' => 'D',
                'name' => '4-5 Door'
            ],
            [
                'code' => 'W',
                'name' => ' Wagon/Estate'
            ],
            [
                'code' => 'V',
                'name' => 'Passenger Van'
            ],
            [
                'code' => 'L',
                'name' => 'Limousine'
            ],
            [
                'code' => 'S',
                'name' => 'Sport'
            ],
            [
                'code' => 'T',
                'name' => 'Convertible'
            ],
            [
                'code' => 'F',
                'name' => 'SUV'
            ],
            [
                'code' => 'J',
                'name' => 'Open Air All Terrain'
            ],
            [
                'code' => 'X',
                'name' => 'Special'
            ],
            [
                'code' => 'P',
                'name' => 'Pick up Regular Cab'
            ],
            [
                'code' => 'Q',
                'name' => 'Pick up Extended Cab'
            ],
            [
                'code' => 'Z',
                'name' => 'Special Offer Car'
            ],
            [
                'code' => 'E',
                'name' => 'Coupe'
            ],
            [
                'code' => 'M',
                'name' => 'Monospace (European use)'
            ],
            [
                'code' => 'H',
                'name' => 'Motor Home'
            ],
            [
                'code' => 'Y',
                'name' => '2 Wheel Vehicle'
            ],
            [
                'code' => 'N',
                'name' => 'Roadster'
            ],
        ]);

        \App\Models\CarTransDrive::insert([
            [
                'code' => 'M',
                'name' => 'Manual Unspecified Drive'
            ],
            [
                'code' => 'N',
                'name' => 'Manual 4WD'
            ],
            [
                'code' => 'C',
                'name' => 'Manual AWD'
            ],
            [
                'code' => 'A',
                'name' => 'Auto Unspecified Drive'
            ],
            [
                'code' => 'B',
                'name' => 'Auto 4WD'
            ],
            [
                'code' => 'D',
                'name' => 'Auto AWD'
            ],
        ]);

        \App\Models\CarAirconFuel::insert([
            [
              'code' => 'R',
              'name' => 'Unspecified Fuel/Power With Air'
            ],
            [
                'code' => 'N',
                'name' => 'Unspecified Fuel/Power Without Air'
            ],
            [
                'code' => 'D',
                'name' => 'Diesel Air'
            ],
            [
                'code' => 'Q',
                'name' => 'Diesel No Air'
            ],
            [
                'code' => 'H',
                'name' => 'Hybrid Air'
            ],
            [
                'code' => 'I',
                'name' => 'Hybrid No Air'
            ],
            [
                'code' => 'E',
                'name' => 'Electric Air'
            ],
            [
                'code' => 'C',
                'name' => 'Electric No Air'
            ],
            [
                'code' => 'L',
                'name' => 'LPG/Compressed Gas Air'
            ],
            [
                'code' => 'S',
                'name' => 'LPG/Compressed Gas No Air'
            ],
            [
                'code' => 'A',
                'name' => 'Hydrogen Air'
            ],
            [
                'code' => 'B',
                'name' => 'Hydrogen No Air'
            ],
            [
                'code' => 'M',
                'name' => 'Multi Fuel/Power Air'
            ],
            [
                'code' => 'F',
                'name' => 'Multi Fuel/Power No Air'
            ],
            [
                'code' => 'V',
                'name' => 'Petrol Air (European use)'
            ],
            [
                'code' => 'Z',
                'name' => 'Petrol No Air (European use)'
            ],
            [
                'code' => 'U',
                'name' => 'Ethanol Air'
            ],
            [
                'code' => 'X',
                'name' => 'Ethanol No Air'
            ],
        ]);
    }
}
