<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use App\Models\ActivityLog as Log;

class ActivityLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeMethods = Route::current()->methods();

        if(in_array('GET',$routeMethods)){
            return $next($request);
        }
        else {
            $currentAction = Route::currentRouteAction();
            list($controller, $method) = explode('@', $currentAction);
            $controller = preg_replace('/.*\\\/', '', $controller);
            $controller = str_replace('Controller','',$controller);

            Log::create([
                'user_id' => $request->user('api')->id,
                'action'  => Route::current()->getActionMethod().' '.$controller,
                'params'  => json_encode($request->all()),
            ]);

            return $next($request);
        }

    }
}
