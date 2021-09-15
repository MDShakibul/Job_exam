<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class AdminSignOutController extends Controller
{
    public function admin_logout()
    {
        session()->flush();
        return Redirect::to('/admin');
    }
}
