<?php

namespace App\Http\Middleware;

use Closure;

class CheckPage
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
        if ($request->page->title === 'About Us') {
            return back();
        }
        return $next($request);
    }
}
