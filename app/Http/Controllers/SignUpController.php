<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator;

class SignUpController extends Controller
{
  //View SignUp
  function index()
  {
    return view('SignUp.index');
  }

  public function requestSignUp(Request $request)
    {
        $validate = Validator:: make($request->all(),[
            'username' => 'required',
            'password' =>'required|min:4',
            'confirmpassword' =>'required|same:password',
            'fullname' =>'required',
            'design' =>'required',
            'email' =>'required',
            'age' =>'required|min:1',
        ]);
        if($validate->fails())
        {
            return back()->with('errors',$validate->errors())->withInput();
        }
        else
        {
            $checkusername = DB::table('login')->where('username', $request->username)->get();
            $checkmail = DB::table('users')->where('email',$request->email)->get();

            if(count($checkusername) < 1 && count($checkmail) < 1)
            {
              DB::table('login')->insert(['username'=>$request->username, 'role_id'=>'2', 'password'=>$request->confirmpassword]);
              DB::table('users')->insert(['username'=>$request->username, 'role_id'=>'2', 'name'=>$request->fullname,'email'=>$request->email,'age'=>$request->age, 'occupation'=>$request->design]);
              return redirect()->route('signin')->with('success','Account Created. Ready to Sign In');
            }

            else
            {
              return back()->with('msg', 'Username/Email has been taken.')->withInput();
            }
        }
    }
}
