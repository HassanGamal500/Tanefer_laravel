<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@tanefer.com')->first();

        if(! is_null($user)){
            $user->delete();
        }

        $user = User::create([
            'name' => 'Tanefer',
            'email' => 'admin@tanefer.com',
            'email_verified_at' => now(),
            'password' => bcrypt('a50b22c8'),
            'phone'    => '01119685580',
            'client_id' => 6
        ]);

        $user->assignRole('admin');
    }
}
