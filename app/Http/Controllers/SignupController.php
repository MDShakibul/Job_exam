<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SignupController extends Controller
{
    public function user_logout()
    {
        Auth::logout();
        session()->flush();
        return Redirect::to('/');
    }
}
