<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(AdminUsersSeeder::class);
        $this->call(CarTypeSeeder::class);
        $this->call(HotelBookingStatusSeeder::class);
        $this->call(ProfitSeeder::class);
        $this->call(PaymentStatusSeeder::class);
        $this->call(ClientSeeder::class);
    }
}
