<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SigninController extends Controller
{

    public function page()
    {
        return view('user_login');
    }

    public function login(Request $request)
    {

        $credentials = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ])->validate();

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($credentials)) {
            if ($user->is_verified == 1) {
                $request->session()->regenerate();
                $app_list = DB::table('application_type')->get();
                //dd($user->id);
                $request->session()->put('user_id', $user->id);
                return view('user_index', compact(['app_list']));
            } else {
                return redirect()->back()->with(session()->flash('alert-danger', 'You are not an active user! Please contact with admin!'));
            }
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'User Password Or User Id does not match'));
        }
    }
}
