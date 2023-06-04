<?php

use Illuminate\Database\Seeder;

class PassportClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Laravel\Passport\Client::insert([[
            'name' => 'web',
            'secret' => 'YfwNCIJofGhV5MNel4l3E9Jas4Odf5FWjN7bk3xr',
            'redirect' => '',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0
        ],[
            'name' => 'web',
            'secret' => 'J8DbcrC11kwz3cRVd3lo3t69z4G94E8V88fYZANs',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0
        ],[
            'name' => 'android',
            'secret' => '0bfWDL2ixebuV3ZS4Nw7fdtTdJKpxTWwXeEnw0kN',
            'redirect' => '',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0
        ],
            [
                'name' => 'android',
                'secret' => 'O8RLdN364XH3aYNBXpWlp3r1YLeTn0qp4O20INsh',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0
            ]
        ]);
    }
}
