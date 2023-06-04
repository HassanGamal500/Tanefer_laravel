<?php

namespace App\Http\Middleware;

use Closure;

class LogQueue
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
        deleteFirstCreatedFolderFromMonth();
        return $next($request);
    }
}
