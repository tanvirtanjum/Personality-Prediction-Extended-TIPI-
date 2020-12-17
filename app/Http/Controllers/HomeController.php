<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  //View Home
  function index()
  {
    return view('Home.index');
  }
}
