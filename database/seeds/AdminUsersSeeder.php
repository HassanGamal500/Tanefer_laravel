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
        
        ////////////////////////////////////////////////////////////////
        
        $userOne = User::where('email','solutions@dvyns.com')->first();

        if(! is_null($userOne)){
            $userOne->delete();
        }

        $userOne = User::create([
            'name' => 'Solutions',
            'email' => 'solutions@dvyns.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Admin123'),
            'client_id' => 6
        ]);

        $userOne->assignRole('admin');
        
        ////////////////////////////////////////////////////////////////
        
        $userTwo = User::where('email','seo@dvyns.com')->first();

        if(! is_null($userTwo)){
            $userTwo->delete();
        }

        $userTwo = User::create([
            'name' => 'Seo',
            'email' => 'seo@dvyns.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Admin123'),
            'client_id' => 6
        ]);

        $userTwo->assignRole('admin');
        
        ////////////////////////////////////////////////////////////////
        
        $userThree = User::where('email','ads@dvyns.com')->first();

        if(! is_null($userThree)){
            $userThree->delete();
        }

        $userThree = User::create([
            'name' => 'Ads',
            'email' => 'ads@dvyns.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Admin123'),
            'client_id' => 6
        ]);

        $userThree->assignRole('admin');
        
        ////////////////////////////////////////////////////////////////
        
        $userFour = User::where('email','social@dvyns.com')->first();

        if(! is_null($userFour)){
            $userFour->delete();
        }

        $userFour = User::create([
            'name' => 'Social',
            'email' => 'social@dvyns.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Admin123'),
            'client_id' => 6
        ]);

        $userFour->assignRole('admin');
    }
}
