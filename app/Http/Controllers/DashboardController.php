<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard.list');
    }

    function userProfile()
    {

        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.auth.profile', compact('user'));
    }

    # User Profile Change

    public function ProfileUpdate(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'about' => 'nullable|string|max:500',
        //     'address' => 'nullable|string|max:255',
        //     'phone' => 'nullable|string|max:15',
        //     'twitter' => 'nullable|string|max:255',
        //     'facebook' => 'nullable|string|max:255',
        //     'instagram' => 'nullable|string|max:255',
        //     'linkedin' => 'nullable|string|max:255',
        // ]);

        $user = User::findOrFail(Auth::id());

        # old image delete
        if ($user->ProfilePicture && file_exists(public_path($user->ProfilePicture))) {
            unlink(public_path($user->ProfilePicture));
        }
        # image uploads
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin-profile'), $imageName);
            $user->ProfilePicture = 'uploads/admin-profile/' . $imageName;
            $user->save();
        }

        # User Information Update
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        # UserProfile Information Update
        // if (!$userProfile) {
        // $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();
        // if (!$userProfile) {
        //     $userProfile = new UserProfile();
        //     $userProfile->user_id = Auth::user()->id;
        // }
        // }

        $userProfile = UserProfile::where('user_id', Auth::user()->id)->first();
        // $userProfile = UserProfile::find(Auth::user()->id);

        $userProfile->about = $request->about;
        $userProfile->address = $request->address;
        $userProfile->phone = $request->phone;
        $userProfile->user_id = Auth::user()->id;
        $userProfile->twitter_profile = $request->twitter;
        $userProfile->facebook_profile = $request->facebook;
        $userProfile->instagram_profile = $request->instagram;
        $userProfile->linkedin_profile = $request->linkedin;
        $userProfile->save();

        return redirect()->route('user.profile')->with('notification', NotificationHelper::notify('Profile updated successfully!', 'success'));
    }

    # ProfilePasswordChange

    public function ProfilePasswordChange()
    {
        // $user = User::where('id', Auth::user()->id)->first();
        

        return view('admin.auth.changePassword', [
            'user' => User::find(Auth::user()->id)
        ]);
    }

    # ProfilePasswordUpdate
    public function ProfilePasswordUpdate(Request $request)
    {

        // $request->validate([
        //     'current_password' => 'required|string',
        //     'new_password' => 'required|string|min:8|confirmed',
        //     'confirm_password' => 'required|string|min:8',
        // ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            # Check if the new password and confirm password match
            if ($request->new_password === $request->confirm_password) {
                # Update the password
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->route('user.profile')->with('notification', NotificationHelper::notify('Password Updated Successfully !!', 'success'));
            } else {
                # If they do not match, redirect back with an error message
                return redirect()->back()->with('error', 'New Password and Confirm Password do not match');
            }
        } else {
            # If the current password is incorrect, redirect back with an error message
            return redirect()->back()->with('error', 'Current Password is incorrect');
        }

    }
}
