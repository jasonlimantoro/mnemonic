<?php

namespace App\Http\Middleware;

use Closure;

class Subdomain
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
        $route = $request->route();
        //$subdomain = $route->parameter('subdomain');
        $route->forgetParameter('subdomain');
        //store parameter for later use
        return $next($request);
    }
}
