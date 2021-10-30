<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Admin;
use App\Models\User_detail;

class AdminloginController extends Controller
{

    public function login()
    {
        return view('admin.admin_login');
    }

    public function dashboard_home()
    {
        $user_list = User_detail::join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return view('admin.dashboard', compact('user_list'));
    }


    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = Admin::where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        //dd($result);

        if ($result) {
            $user_list = User_detail::join('application_type', 'user_details.application_type', 'application_type.id')
                ->select('user_details.*', 'application_type.application_type as app_type')
                ->get();

            //dd($user_list);

            $request->session()->put('admin_id', $result->id);
            $request->session()->put('admin_name', $result->admin_name);
            // dd($result->id);

            return view('admin.dashboard', compact('user_list'));
        } else {
            return view('admin.admin_login');
        }
    }
}
