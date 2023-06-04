<?php

use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PaymentStatus::truncate();

        $statuses = [
             "Hold",
             "Done",
             "Released",
             "PartiallyRefund",
             "TotallyRefund",
        ];

        foreach ($statuses as $status){
            \App\Models\PaymentStatus::create(['name' => $status]);
        }
    }
}
