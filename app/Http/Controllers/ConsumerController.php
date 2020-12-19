<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumerController extends Controller
{
  function index()
  {
    return view('ConsumerDash.index');
  }

  function viewQuizModule(Request $request)
  {
    $ques = DB::table('questions')->orderBy('id', 'asc')->get();
    $ans = DB::table('answers')->orderBy('id', 'asc')->get();

    return view('ConsumerDash.TakeQuiz.index')->with('ques', $ques)->with('ans', $ans);
  }



  function postQuizModule(Request $request)
  {
    $Extraversion= 0;
    $ecount = 0;
    $Conscientiousness= 0;
    $ccount = 0;
    $Openness= 0;
    $ocount = 0;
    $Agreeableness= 0;
    $acount = 0;
    $Neuroticism= 0;
    $ncount = 0;

    $q1 = $request->q1;
    $q2 = $request->q2;
    $q3 = $request->q3;
    $q4 = $request->q4;
    $q5 = $request->q5;
    $q6 = $request->q6;
    $q7 = $request->q7;
    $q8 = $request->q8;
    $q9 = $request->q9;
    $q10 = $request->q10;
    $q11 = $request->q11;
    $q12 = $request->q12;
    $q13 = $request->q13;
    $q14 = $request->q14;
    $q15 = $request->q15;
    $q16 = $request->q16;
    $q17 = $request->q17;
    $q18 = $request->q18;
    $q19 = $request->q19;
    $q20 = $request->q20;

    //Calculating Extraversion
    if(($q1==1 && $q2==7) || ($q1==7 && $q2==1))
    {
      $Extraversion = $Extraversion;
      $ecount += 0;
    }
    else
    {
      $Extraversion = $Extraversion+$q1+$q2;
      $ecount += 2;
    }
    if(($q3==1 && $q4==7) || ($q3==7 && $q4==1))
    {
      $Extraversion =$Extraversion;
      $ecount += 0;
    }
    else
    {
      $Extraversion =$Extraversion+$q3+$q4;
      $ecount += 2;
    }

    if($ecount != 0)
    {
      $Extraversion = $Extraversion/$ecount;
    }

    //Calculating Conscientiousness
    if(($q5==1 && $q6==7) || ($q5==7 && $q6==1))
    {
      $Conscientiousness = $Conscientiousness;
      $ccount += 0;
    }
    else
    {
      $Conscientiousness = $Conscientiousness+$q5+$q6;
      $ccount += 2;
    }
    if(($q7==1 && $q8==7) || ($q7==7 && $q8==1))
    {
      $Conscientiousness =$Conscientiousness;
      $ccount += 0;
    }
    else
    {
      $Conscientiousness =$Conscientiousness+$q7+$q8;
      $ccount += 2;
    }

    if($ccount != 0)
    {
      $Conscientiousness = $Conscientiousness/$ccount;
    }


    //return $Extraversion;


  }
}
