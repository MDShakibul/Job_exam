<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller
{

    public function page()
    {
        return view('user_login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if (Hash::check($request->password, optional($user)->password)) {
            if ($user->is_verified == 1) {
                if (Auth::attempt(['email' =>  $email, 'password' => $request->password])) {
                    $app_list = DB::table('application_type')->get();

                    /* $request->session()->put('user_id', $user->id);
                    dd($user->id); */
                    $request->session()->put('user_id', $user->id);
                    return view('user_index', compact(['app_list']));
                }
            }
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'User Password Or User Id does not match'));
        }
    }
}
