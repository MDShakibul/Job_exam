<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UpdateProfileController extends Controller
{
    public function updateprofile()
    {
        return view('update_profile');
    }

    public function update_password(Request $request)
    {
        $current_user = User::where('id', Auth::user()->id)->first();
        //dd($current_user);

        if ($request->new_password == $request->confirm_password) {
            if (Hash::check($request->old_password, $current_user->password)) {

                User::find($current_user->id)->update(['password' => Hash::make($request->new_password)]);

                return Redirect::to('/')->with(session()->flash('alert-success', 'Your Password Changed. Please login again'));
            } else {
                return Redirect::to('/update_profile')->with(session()->flash('alert-danger', 'Old Password does not match'));
            }
        } else {
            return Redirect::to('/update_profile')->with(session()->flash('alert-danger', 'New Password and Confirm Password does not match'));
        }
    }
}
