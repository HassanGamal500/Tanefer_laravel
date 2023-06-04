<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        \Spatie\Permission\Models\Role::truncate();

        \Spatie\Permission\Models\Role::create(['name'=>'customer']);
        \Spatie\Permission\Models\Role::create(['name'=>'admin']);
        \Spatie\Permission\Models\Role::create(['name'=>'agent']);
        \Spatie\Permission\Models\Role::create(['name'=>'subAgent']);
        \Spatie\Permission\Models\Role::create(['name'=>'ats_admin']);
        \Spatie\Permission\Models\Role::create(['name'=>'ats_manager']);
        \Spatie\Permission\Models\Role::create(['name'=>'ats_agent']);
        \Spatie\Permission\Models\Role::create(['name'=>'ats_subAgent']);

    }
}
