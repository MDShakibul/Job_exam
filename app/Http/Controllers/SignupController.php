<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class SignupController extends Controller
{
    public function user_logout()
    {
        session()->flush();
        return Redirect::to('/');
    }
}
