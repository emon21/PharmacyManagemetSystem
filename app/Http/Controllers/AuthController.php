<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {

        return view('auth.login');
    }

    public function LoginPost(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::User()->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Please enter the correct credentials');
            }
        }else{
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function ForgotAccount(Request $request)
    {
        return view('auth.forgot');
    }

    public function logout(){

        Auth::logout();
        return redirect(url('/'));
    }
}
