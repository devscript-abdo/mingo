<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;


    // protected $redirectTo = RouteServiceProvider::CUSTOMER_DASH;


    public function __construct()
    {

        $this->middleware('guest:customer')->except('logout');
    }

    public function loginForm()
    {
        session()->put('prevUrl', url()->previous());

        return view('theme.auth.customer.login.index');
    }

    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect(route('home'));
    }


    protected function attemptLogin(Request $request)
    {
        /*if (!$request->has('guard') && !$request->filled('guard')) {

            return false;
        }

        $guard = $request->only('guard');

        if (!isset($guard) && !in_array($guard['guard'], $this->appGuard)) {

            return false;
        }*/
        //dd('Oui',$request);
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * @param string $guard
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {

        return Auth::guard('customer');
    }

    private function redirectTo()
    {
        // dd($this->redirectTo);

        if (session()->has('prevUrl')) {

            return str_replace(url('/'), '', session()->get('prevUrl', '/'));
        } else {
            return route('customer.profil');
        }
    }
}
