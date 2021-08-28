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


  public function deleteHistory()
  {
    $histories = auth('customer')->user()->loginHistory()->get();

    foreach ($histories as $history) {
      $history->delete();
      return redirect()->back()->with('message','All Old histories was deleted');
    }
    return redirect()->back();
  }
}
