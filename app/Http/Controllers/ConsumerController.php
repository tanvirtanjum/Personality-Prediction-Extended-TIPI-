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
    //Initialization
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

    //Get Answers From Form
    $q1 = $request->q1;//Extraversion(Set-1)-S
    $q2 = $request->q2;//Extraversion(Set-1)-R
    $q3 = $request->q3;//Extraversion(Set-2)-S
    $q4 = $request->q4;//Extraversion(Set-2)-R
    $q5 = $request->q5;//Conscientiousness(Set-1)-S
    $q6 = $request->q6;//Conscientiousness(Set-1)-R
    $q7 = $request->q7;//Conscientiousness(Set-1)-S
    $q8 = $request->q8;//Conscientiousness(Set-1)-R
    $q9 = $request->q9;//Openness(Set-1)-S
    $q10 = $request->q10;//Openness(Set-1)-R
    $q11 = $request->q11;//Openness(Set-2)-S
    $q12 = $request->q12;//Openness(Set-2)-R
    $q13 = $request->q13;//Agreeableness(Set-1)-S
    $q14 = $request->q14;//Agreeableness(Set-1)-R
    $q15 = $request->q15;//Agreeableness(Set-2)-S
    $q16 = $request->q16;//Agreeableness(Set-2)-R
    $q17 = $request->q17;//Neuroticism(Set-1)-S
    $q18 = $request->q18;//Neuroticism(Set-1)-R
    $q19 = $request->q19;//Neuroticism(Set-1)-S
    $q20 = $request->q20;//Neuroticism(Set-1)-R

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

    if($ecount > 0 && $Extraversion > 0)
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

    if($ccount > 0 && $Conscientiousness > 0)
    {
      $Conscientiousness = $Conscientiousness/$ccount;
    }

    //Calculating Openness
    if(($q9==1 && $q10==7) || ($q9==7 && $q10==1))
    {
      $Openness = $Openness;
      $ocount += 0;
    }
    else
    {
      $Openness = $Openness+$q9+$q10;
      $ocount += 2;
    }
    if(($q11==1 && $q12==7) || ($q11==7 && $q12==1))
    {
      $Openness =$Openness;
      $ocount += 0;
    }
    else
    {
      $Openness =$Openness+$q11+$q12;
      $ocount += 2;
    }

    if($ocount > 0 && $Openness > 0)
    {
      $Openness = $Openness/$ocount;
    }

    //Calculating Agreeableness
    if(($q13==1 && $q14==7) || ($q13==7 && $q14==1))
    {
      $Agreeableness = $Agreeableness;
      $acount += 0;
    }
    else
    {
      $Agreeableness = $Agreeableness+$q13+$q14;
      $acount += 2;
    }
    if(($q15==1 && $q16==7) || ($q15==7 && $q16==1))
    {
      $Agreeableness =$Agreeableness;
      $acount += 0;
    }
    else
    {
      $Agreeableness =$Agreeableness+$q15+$q16;
      $acount += 2;
    }

    if($acount > 0 && $Agreeableness > 0)
    {
      $Agreeableness = $Agreeableness/$acount;
    }

    //Calculating Neuroticism
    if(($q17==1 && $q18==7) || ($q17==7 && $q18==1))
    {
      $Neuroticism = $Neuroticism;
      $ncount += 0;
    }
    else
    {
      $Neuroticism = $Neuroticism+$q17+$q18;
      $ncount += 2;
    }
    if(($q19==1 && $q20==7) || ($q19==7 && $q20==1))
    {
      $Neuroticism =$Neuroticism;
      $ncount += 0;
    }
    else
    {
      $Neuroticism =$Neuroticism+$q19+$q20;
      $ncount += 2;
    }

    if($ncount > 0 && $Neuroticism > 0)
    {
      $Neuroticism = $Neuroticism/$ncount;
    }

    //Store in Database
      DB::table('results')->insert(['username'=>$request->session()->get('user'),
                                    'extraversion_score'=>$Extraversion,
                                    'conscientiousness_score'=>$Conscientiousness,
                                    'openness_score'=>$Openness,
                                    'agreeableness_score'=>$Agreeableness,
                                    'neuroticism_score'=>$Neuroticism]);
    //Redirect
    $request->session()->flash('_message', 'Thank you for submission.');
    return redirect()->route('consumer.dash');

  }

  function viewScore(Request $request)
  {
    $res = DB::table('results')->where('username','=', $request->session()->get('user'))->get();

    return view('ConsumerDash.BandScore.index')->with('res', $res);
  }
}
