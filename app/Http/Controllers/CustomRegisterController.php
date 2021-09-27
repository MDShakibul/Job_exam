<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CustomRegisterController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $verification_code = $user->verification_code = sha1(time());
        $user->save();
        $data = [
            'name' => $request->name,
            'email' =>  $request->email,
            'verification_code' => $verification_code,
        ];

        Mail::send('emails.register_new_user', $data, function ($message) use ($user) {
            $message->to($user->email)->subject('My Website Registration');
        });

        if ($user->save()) {
            return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check your email for varification link'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong.Please try again'));
        }
    }

    public function verifyUser()
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        //dd($verification_code);

        $user = User::Where(['verification_code' => $verification_code])->first();
        if ($user != null) {
            $user->is_verified = 1;
            $user->save();
            $app_list = DB::table('application_type')->get();
            session()->put('user_id', $user->id);
            return view('user_index', compact(['app_list']));
        }
        return view('user_login')->with(session()->flash('alert-danger', 'Something went wrong'));
    }
}
