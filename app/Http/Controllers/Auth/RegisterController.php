<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

Session_start();


class RegisterController extends RoutingController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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
