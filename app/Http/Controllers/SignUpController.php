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

  public function create(Request $request)
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
            $LID = $request->username;
            $pass= $request->confirmpassword;
            $SID = '0';

            $login_table = DB::table('log_in')->insert(['LID'=>$LID,'SID'=>$SID,'PASS'=>$pass]);

            if($login_table== TRUE)
            {
                DB::table('customer')->insert(['cusid'=>$LID,'name'=>$request->fullname, 'design'=>$request->design,'email'=>$request->email,'mobile'=>$request->mobile,'status'=>'2']);
                DB::table('profile_image')->insert([['UID' => $LID, 'IMAGE' => 'BT_Default_avatar_011211.png']]);

                return redirect()->route('login.index')->with('success','Account Created wait for Admin Verify');
            }
        }
    }
}
