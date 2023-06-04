<?php

namespace App\Providers;

use App\Models\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if((! Cache::has('clients-'.app()->environment()) && ! app()->runningInConsole())){
            $clients = Client::with(['parentClient'])->get();
            Cache::forever('clients-'.app()->environment(),$clients);
        }
        Schema::defaultStringLength(191);
        request()->headers->set('clientIP',request()->ip());


        if(request()->server('SERVER_PORT') == '80'){
            URL::forceScheme('https');
        }

    }
}
