<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignInController extends Controller
{
  //View SignIn
  function index()
  {
    return view('SignIn.index');
  }

  function requestSignIn(Request $request)
  {
    $user = DB::table('login')->where('username', $request->username)->where('password', $request->password)->get();

    if(count($user) > 0)
    {
      $request->session()->put('user', $user[0]->username);
      $request->session()->put('role', $user[0]->role_id);

      if($request->session()->get('role') == 1)
      {
        //ADMIN
      }

      if($request->session()->get('role') == 2)
      {
        //CONSUMER
      }
    }

    else
    {
      $request->session()->flash('_alert', 'Invalid');
      return redirect()->route('signin');
    }
  }
}
