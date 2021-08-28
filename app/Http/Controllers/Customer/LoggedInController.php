<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\UserLogin;
use Illuminate\Http\Request;

class LoggedInController extends Controller
{


  public  function  index()
  {

    $sessions = auth('customer')->user()->withLastLogin() ?? [];

    $sessionsAll = auth('customer')->user()->GetLoginHistory() ?? [];

    return view('theme.auth.customer.app.logged.index', compact('sessions', 'sessionsAll'));
  }


  public function deleteHistory()
  {
    // $histories = auth('customer')->user()->loginHistory()->get();

    UserLogin::whereIn('customer_id', [auth('customer')->user()->id])->delete();

    return redirect()->back();
  }
}
