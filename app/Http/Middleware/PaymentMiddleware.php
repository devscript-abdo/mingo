<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentMiddleware
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
        $contains = Str::contains(url()->previous(), ['app/checkout', 'app/guest-checkout']);
        // dd(route('checkout'), "****", $contains, "***", url()->previous());
        if (!$contains) {

            return redirect()->back();
        }
        return $next($request);
    }
}
