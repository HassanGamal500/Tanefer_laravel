<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapApiAuthRoutes();

        $this->mapApiAdminRoutes();

        $this->mapApiCarsRoutes();

        $this->mapApiFlightsRoutes();

        $this->mapApiHotelsRoutes();

        $this->mapApiToursRoutes();

        $this->mapApiPackagesRoutes();

        $this->mapApiActivitiesRoutes();

        $this->mapApiCruisesRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace.'\ApiV1')
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "api" routes for the authentication.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiAuthRoutes()
    {
        Route::prefix('api/v2/auth')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/authentication.php'));
    }

    /**
     * Define the "api" routes for the Flights.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiFlightsRoutes()
    {
        Route::prefix('api/v2/flights')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/flights.php'));
    }

    /**
     * Define the "api" routes for the Hotels.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiHotelsRoutes()
    {
        Route::prefix('api/v2/hotels')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/hotels.php'));
    }

    /**
     * Define the "api" routes for the Cars.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiCarsRoutes()
    {
        Route::prefix('api/v2/cars')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/cars.php'));
    }

    /**
     * Define the "api" routes for the User.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiUserRoutes()
    {
        Route::prefix('api/v2/user')
            ->middleware(['api','api:auth'])
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/user.php'));
    }

    /**
     * Define the "api" routes for the Admin.
     *
     * These routes are typically stateful.
     *
     * @return void
     */
    protected function mapApiAdminRoutes()
    {
        Route::prefix('api/v2/admin')
            ->middleware(['api','auth:api','admin_logs'])
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/admin.php'));
    }

    protected function mapApiToursRoutes()
    {
        Route::prefix('api/v2/tours')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/tours.php'));
    }

    /**
     * Define the "api" routes for the authentication.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiPackagesRoutes()
    {
        Route::prefix('api/v2/packages')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/packages.php'));
    }

    /**
     * Define the "api" routes for the authentication.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiCruisesRoutes()
    {
        Route::prefix('api/v2/cruises')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/cruise.php'));
    }

    /**
     * Define the "api" routes for the authentication.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiActivitiesRoutes()
    {
        Route::prefix('api/v2/activities')
            ->middleware('api')
            ->namespace($this->namespace.'\ApiV2')
            ->group(base_path('routes/V2/activity.php'));
    }


}
