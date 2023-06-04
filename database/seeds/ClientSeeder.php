<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Client::insert(
            [
                [
                    'name' => 'fare33',
                    'url'  => 'https://www.fare33.com'
                ],
                [
                    'name' => 'dev-fare33',
                    'url'  => 'http://dev.fare33.com'
                ],
                [
                    'name' => 'Android',
                    'url'  => 'dhD0IUJn7AgctxYDkZhAu0GoE5oWvLndAkIDFjdD'
                ],
                [
                    'name' => 'IOS',
                    'url'  => 'WG9lsUm7NUDBYjYGo0KlysjxdrvQTYELFIsUgiL0'
                ],
                [
                    'name' => 'Adam Travel',
                    'url'  => 'https://adamtravel.com'
                ],
                [
                    'name' => 'Tanefer',
                    'url'  => 'https://demo.tanefer.com'
                ]
            ]
        );
    }
}
