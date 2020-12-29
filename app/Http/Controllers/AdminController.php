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

  function viewConsumers(Request $request)
  {
    $res = DB::table('users')->where("role_id","=","2")->get();

    return view('AdminDash.ConsumersList.index')->with('res', $res);
  }

  function removeConsumers(string $username, Request $request)
  {
    DB::table('results')->where('username','=',$username)->delete();
    DB::table('users')->where('username','=',$username)->delete();
    DB::table('login')->where('username','=',$username)->delete();

    return redirect()->route("admin.consumers");
  }

  function viewQuestionManagement(Request $request)
  {
    $res = DB::table('questions')
          ->join('traits', 'traits.id', '=', 'questions.trait_id')
          ->join('question_types', 'question_types.id', '=', 'questions.type_id')
          ->join('question_sets', 'question_sets.id', '=', 'questions.set_id')
          ->select('questions.id', 'questions.question', 'traits.trait_name','question_types.type_name','question_sets.set_name')
          ->get();
          //->join('traits','traits.id','questions.trait_id')->distinct('questions.trait_id')
          //->join('question_types','question_types.id','questions.type_id')->distinct('questions.type_id')
          //->join('question_sets','question_sets.id','questions.set_id')->distinct('questions.set_id')
          //->get(['traits.trait_name','question_types.type_name','question_sets.set_name']);
          //return $res;
    return view('AdminDash.QuestionList.index')->with('res', $res);
  }

  function viewEditQuestionManagement(int $id, Request $request)
  {
    $res = DB::table('questions')
          ->join('traits', 'traits.id', '=', 'questions.trait_id')
          ->join('question_types', 'question_types.id', '=', 'questions.type_id')
          ->join('question_sets', 'question_sets.id', '=', 'questions.set_id')
          ->select('questions.id', 'questions.question', 'traits.trait_name','question_types.type_name','question_sets.set_name')
          ->where('questions.id','=',$id)
          ->get();
          //->join('traits','traits.id','questions.trait_id')->distinct('questions.trait_id')
          //->join('question_types','question_types.id','questions.type_id')->distinct('questions.type_id')
          //->join('question_sets','question_sets.id','questions.set_id')->distinct('questions.set_id')
          //->where('questions.id','=',$id)
          //->get(['traits.trait_name','question_types.type_name','question_sets.set_name']);
          //return $res;
    return view('AdminDash.QuestionList.edit')->with('result', $res);
  }

  function requestEditQuestionManagement(int $id, Request $request)
  {
    DB::table('questions')->where('id','=', $id)->update(["question" => $request->ques]);
    return redirect()->route("admin.questions");
  }
}
