<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {
        $user_list=User::whereNot("role","admin")->paginate();
        return view('backend.pages.user_list',compact('user_list'));
    }

    public function login()
    {
        return view('Backend.pages.login');
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=> 'required|string|email:users',
            'password'=>'required|string:users'
        ]);
        $credentials=$request->except('_token');
        //dd($credentials);
    //    $credentials=$request->only(['email','password']);
        Auth::attempt($credentials);
        if(auth()->user())
        {

            return redirect()->route('dashboard');

        }
       // dd('logon oi nai');
        return redirect()->back()->with('message','invalid credentials');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message1','Logout successful.');
    }
}