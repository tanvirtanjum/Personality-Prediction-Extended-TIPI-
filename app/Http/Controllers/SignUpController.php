<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
  //View SignUp
  function index()
  {
    return view('SignUp.index');
  }
}
