<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class CacheMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Cache::has('content')){
            return response(\Cache::get('content'));
        }
        return $next($request);
    }
    
    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        // \Cache::put('content',$response->getContent(),\Carbon\Carbon::now()->addDay(+1));
        \Cache::put('content',$response->getContent(),2);
    }
}
