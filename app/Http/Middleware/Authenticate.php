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

        /* if (!$request->expectsJson()) {


            return route('customer.login');
        }*/

        if ($request->is('api/', 'api/*')) {
            return abort(response()->json([
                'message' => 'Unauthenticated you must be logged in',
            ], 401));
        }

        $routes  = $request->route()->action['middleware'];
        //  dd($routes);

        switch ($routes) {
            case $routes[1] === 'auth:admin':
                return  route('admin.login');
                break;
            case $routes[4] === 'auth:customer':
                return  route('customer.login');
                break;
            default:
                return route('home');
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
