<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminUpdateController extends Controller
{
    public function update_setting()
    {
        return view('admin.admin_update_password');
    }

    public function admin_update_password(Request $request, $admin_id)
    {
        $admin_old_password = $request->admin_old_password;
        $admin_new_password = $request->admin_new_password;
        $admin_confirm_password = $request->admin_confirm_password;

        $current_admin = Admin ::where('id', $admin_id)
            ->first();



        if ($current_admin->admin_password == $admin_old_password) {
            if ($admin_new_password == $admin_confirm_password) {
               Admin :: where('admin_password', $admin_old_password)
                    ->update(['admin_password' => $admin_new_password]);

                return view('admin.admin_login');
            } else {
                return view('admin.admin_update_password')->with(session()->flash('alert-danger', 'New password and Confirm password does not match'));
            }
        } else {
            return view('admin.admin_update_password')->with(session()->flash('alert-danger', 'Old Password doesnot match'));
        }
    }
}
