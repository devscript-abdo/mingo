<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //dd('OOOk');

        if (!$request->expectsJson()) {
            return route('customer.login');
        }

        if ($request->is('api/', 'api/*')) {
            return abort(response()->json([
                'message' => 'Unauthenticated you must be logged in',
            ], 401));
        }
    }

    /*protected function unauthenticated($request, array $guards)
    {
        //dd($guards);
        if (! $request->routeIs('chefckout') && $request->is('api/', 'api/*')) {

            abort(response()->json([
                'message' => 'Unauthenticated you must be logged in',
            ], 401));
        }
    }*/
}
