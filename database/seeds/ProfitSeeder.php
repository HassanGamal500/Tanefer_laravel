<?php

use App\Models\ProfitSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('profit_settings')->count();

        if($count != 0){
            return;
        }

        $profits = [
            [
                'target' => 'flight',
                'amount' => 10,
                'description' => '',
            ],
            [
                'target' => 'hotel',
                'amount' => 5,
                'description' => '',
            ],
            [
                'target' => 'car',
                'amount' => 0,
                'description' => '',
            ]
        ];

        foreach ($profits as $profit){
            ProfitSetting::create($profit);
        }

    }

}
