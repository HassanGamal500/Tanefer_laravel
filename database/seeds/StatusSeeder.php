<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Status::truncate();
        $statuses = [
            'Cancelled',
            'Confirmed',
            'Credit Card Declined',
            'E-pay',
            'E-ticketed',
            'Even exchange',
            'Exchange',
            'Expired',
            'Fraud',
            'Full Refund',
            'Held',
            'In progress',
            'Initial',
            'Involuntary Full Refund',
            'Involuntary Partial Refund',
            'Paper ticketed',
            'Partial Exchange',
            'Partial Refund',
            'Pending Confirmation',
            'ShuttleBook',
            'Test',
            'Trams processed',
            'Void'
        ];
        foreach ($statuses as $status){
            \App\Models\Status::create(['status' => $status]);
        }
    }
}
