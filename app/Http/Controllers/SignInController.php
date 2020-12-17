<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
  //View SignIn
  function index()
  {
    return view('SignIn.index');
  }
}
