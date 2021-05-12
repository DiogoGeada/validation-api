<?php

namespace App\Http\Middleware;

use Closure;

class Api
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
        $request->header('Access-Control-Allow-Origin', '*');
        $request->headers->remove('X-Powered-By');
        $request->headers->remove('Server');
        $request->headers->remove('X-Powered-By');
        $request->headers->remove('X-Powered-By');
        return $next($request);

    }
}