<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignInController extends Controller
{
  //View SignIn
  function index()
  {
    if(session()->has('user') && session()->has('role'))
    {
      return redirect()->route('signin.justify');
    }
    else
    {
      return view('SignIn.index');
    }
  }

  function checkLoggedInUser(Request $request)
  {
    if($request->session()->has('user') && $request->session()->has('role'))
    {
      if(session()->get('role') == 1)
      {
        return redirect()->route('admin.dash');
      }

      if(session()->get('role') == 2)
      {
        return redirect()->route('consumer.dash');
      }
    }
    else
    {
      return redirect()->route('signin');
    }
  }

  //Request SignIn
  function requestSignIn(Request $request)
  {
    $user = DB::table('login')->where('username', $request->username)->where('password', $request->password)->get();

    if(count($user) > 0)
    {
      $request->session()->put('user', $user[0]->username);
      $request->session()->put('role', $user[0]->role_id);

      if($request->session()->get('role') == 1)
      {
        return redirect()->route('admin.dash');
      }

      if($request->session()->get('role') == 2)
      {
        return redirect()->route('consumer.dash');
      }
    }

    else
    {
      $request->session()->flash('_alert', 'Invalid Username/Password');
      return redirect()->route('signin');
    }
  }

  //SignOut
  function requestSignOut(Request $request)
  {
    $request->session()->flush();
  	return redirect()->route('signin');
  }
}
