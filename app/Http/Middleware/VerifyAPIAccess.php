<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAPIAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            (app()->environment('local'))   //!(app()->environment('local'))
            && (
                !$request->header('mingo-access-token')
                || $request->header('mingo-access-token') !== config('mingo.api_access_token')
            )
        ) {
            return response()->json(['Message' => "you don't have permission to access this API."], 403);
        }

        return $next($request);
    }
}
