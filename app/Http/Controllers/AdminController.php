<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  function index()
  {
    return view('AdminDash.index');
  }

  function viewScore(Request $request)
  {
    $res = DB::table('results')->get();

    return view('AdminDash.SurveyResult.index')->with('res', $res);
  }
}
