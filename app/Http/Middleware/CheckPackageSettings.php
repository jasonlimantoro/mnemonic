<?php

namespace App\Http\Middleware;

use App\PackageSetting;
use Closure;

abstract class CheckPackageSettings
{
    protected $settings;

    public function __construct(PackageSetting $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Allowed resources amount in Package Settings
     *
     * @return int
     */
    abstract function allowed();


    /**
     * Current resources count
     *
     * @return int
     */
    abstract function current();


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(app()->environment() === 'testing') {
            return $next($request);
        }

        if ($this->current() >= $this->allowed()){
            if($request->ajax()){
                $data = [
                    'message' => 'Images count exceeded!',
                ];
                return response($data, 403);
            }
            return back();
        }
        return $next($request);
    }
}
