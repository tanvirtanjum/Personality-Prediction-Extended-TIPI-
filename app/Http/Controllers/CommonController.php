<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
  //SignOut
  function requestSignOut(Request $request)
  {
    $request->session()->flush();
    return redirect()->route('signin');
  }

  //ViewChangePassword
  function viewChnagePassword(Request $request)
  {
    //code
  }

  //RequestChangePassword
  function requestChnagePassword(Request $request)
  {
    //code
  }
}
