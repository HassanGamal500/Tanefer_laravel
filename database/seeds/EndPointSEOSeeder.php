<?php

use Illuminate\Database\Seeder;

class EndPointSEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = collect(\Illuminate\Support\Facades\Route::getRoutes())->map(function ($route) {
            return $route->uri();
        });

        $routes = \Illuminate\Support\Arr::where($routes->toArray(),function ($value){
            return (str_contains($value,'packages') || str_contains($value,'tours')
                || str_contains($value,'activities')) && ! str_contains($value,'admin');
        });

        foreach ($routes as $route){
            \App\Models\RouteSEOData::create([
                'route' => $route
            ]);
        }

    }
}
