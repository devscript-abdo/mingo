<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoggedInController extends Controller
{


  public  function  index()
  {

    $sessions = auth('customer')->user()->withLastLogin() ?? [];

    $sessionsAll = auth('customer')->user()->GetLoginHistory() ?? [];

    return view('theme.auth.customer.app.logged.index', compact('sessions', 'sessionsAll'));
  }
}
