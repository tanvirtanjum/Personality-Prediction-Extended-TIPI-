<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CommonController extends Controller
{
  //SignOut
  function requestSignOut(Request $request)
  {
    $request->session()->flush();
    return redirect()->route('signin');
  }

  //ViewAboutUser
  function viewAboutUser(Request $request)
  {
    $user = DB::table('users')->where('username','=', $request->session()->get('user'))->get();
    return view('Common.AboutMe.index')->with('user', $user);
  }

  //ViewUpdateProfile
  function viewUpdateProfile(Request $request)
  {
    $user = DB::table('users')->where('username','=', $request->session()->get('user'))->get();
    return view('Common.AboutMe.EditProfile.index')->with('user', $user);
  }

  //RequestUpdateProfile
  function requestUpdateProfile(Request $request)
  {
    DB::table('users')->where('username','=', $request->session()->get('user'))->update(["name" => $request->fullname, "occupation" => $request->occupation, "email" => $request->email, "age" => $request->age]);
    return redirect()->route('aboutUser');
  }

  //ViewChangePassword
  function viewChnagePassword(Request $request)
  {
    return view('Common.ChangePassword.index');
  }

  //RequestChangePassword
  function requestChnagePassword(Request $request)
  {
    $validate = Validator:: make($request->all(),[
      'oldpassword' => 'required',
      'newpassword' => 'required',
      'confirmnewpassword' => 'required'
    ]);

    if($validate->fails())
    {
      $request->session()->flash('err', 'SOMETHING WENT WRONG.');
      return back()->with('errors',$validate->errors())->withInput();
    }
    else
    {
      $user = DB::table('login')->where('username','=',$request->session()->get('user'))->get()->first();
      if($user->password != $request->oldpassword || strlen($request->newpassword) < 4 || $request->newpassword != $request->confirmnewpassword)
      {
        $request->session()->flash('err', 'SOMETHING WENT WRONG.');
        return redirect()->route('changePassword');
      }
      else
      {
        DB::table('login')->where('username', $request->session()->get('user'))->update(['password' => $request->confirmnewpassword]);
        return redirect()->route('signout');
      }

    }
  }
}
