<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminloginController extends Controller
{

    public function login()
    {
        return view('admin.admin_login');
    }

    public function dashboard_home()
    {
        $user_list = DB::table('user_details')
            ->join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return view('admin.dashboard', compact('user_list'));
    }


    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('admin_login')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        if ($result) {
            $user_list = DB::table('user_details')
                ->join('application_type', 'user_details.application_type', 'application_type.id')
                ->select('user_details.*', 'application_type.application_type as app_type')
                ->get();

            $request->session()->put('admin_id', $result->id);
           // dd($result->id);

            return view('admin.dashboard', compact('user_list'));
        } else {
            return view('admin.admin_login');
        }
    }
}
