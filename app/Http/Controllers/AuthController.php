<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    //

   public function index(){
        return view('welcome');
    }

    public function login(Request $request)
    {
        // $user = User::where('email','=',$request->email)->first();
        // if($user){
        //     $user->remember_token = Str::random(50);
        //     $user->save();
        // }

        // # Mail Send
        // Mail::to($user->email)->send(new ForgotPasswordMail($user));

        $user = User::latest()->get();
        return view('auth.login', ['user' => $user]);
    }

    public function LoginPost(Request $request)
    {

        // $userPassword = $request->password;
        // $PasswordCheck = Hash::make($userPassword);

        # hash algorithom to string

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::User()->role == 'admin') {

                return redirect()->intended('admin/dashboard')->with('notification', NotificationHelper::notify('Login SuccessFully !!', 'success'));
            } else {
                return redirect()->back()->with('error', 'Please enter the correct credentials');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function ForgotAccount(Request $request)
    {
        return view('auth.forgot');
    }

    public function ForgotPassword(Request $request)
    {
        $check = User::where('email', '=', $request->email)->count();
        if ($check > 0) {
            $user = User::where('email', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            # Mail Send
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Password Has Been Reset.Please Check Your SPAM or junk Mail Folder');
        } else {
            return redirect()->back()->withInput()->with('error', 'Email not fount in the  system');
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect(route('/'))->with('notification', NotificationHelper::notify('Logout SuccessFully !!', 'warning'));
    }


    # Backend  User Profile

    public function userProfile()
    {
        // $auth = Auth::user()->id;
        // return $auth;

        # Auth Check

        // $authCheck = Auth::User()->id;
        //    return $authCheck;

        // if(){

        // }else{

        // }

        // $id = Auth::user()->id;
        // return $id;

        //  $user = User::find('id', Auth::User()->id)->with('UserProfile')->first();
        // $user = User::find($id)->with('UserProfile')->first();
        // $user = User::where('id',$id)->with('UserProfile')->first();

        // $user = User::where('id',Auth::user()->id)->with('UserProfile')->first();

        $user = User::where('id', Auth::user()->id)->first();

        // return $user;

        return view('auth.profile', ['user' => $user]);
    }



    # Profile Change
    function profileChange(Request $request)
    {

        // $user = User::where('id', Auth::user()->id)->first();
        // return $user;
        //return $request->about;

        // return view('auth.profileChange', ['user' => $user]);

        $user = new UserProfile();

        # user profile change

        $user->user_id = Auth::user()->id;
        // return $user;

        // $user = User::find(Auth::user()->id);
        // $user->about = $request->about;
        // $user->address = $request->address;
        // $user->user()->name = $request->name;
        // $user->user()->email = $request->email;

        // $user->phone = $request->phone;

        $user->twitter_profile = $request->twitter;
        $user->facebook_profile = $request->facebook;
        $user->instagram_profile = $request->instagram;
        $user->save();

        return redirect()->route('user.profile');
    }

    public function ProfileUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('user.profile')->with('notification', NotificationHelper::notify('Profile Updated Successfully !!', 'success'));
    }

    public function ProfilePasswordUpdate(Request $request,User $user)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        // Check if the current password matches the user's password
        // $user = User::where('id', Auth::user()->id)->first();
        // return $user;
        // $user = User::find(Auth::user()->id);
        // return $user;

        $user = User::find(Auth::user()->id);

        if (Hash::check($request->current_password, $user->password)) {
            if ($request->new_password == $request->confirm_password) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->route('user.profile')->with('notification', NotificationHelper::notify('Password Updated Successfully !!', 'success'));
            } else {
                return redirect()->back()->with('error', 'New Password and Confirm Password do not match');
            }
        } else {
            return redirect()->back()->with('error', 'Current Password is incorrect');
        }

        
    }

    // public function dashboard()
    // {
    //     return view('admin.dashboard');
    // }
}
