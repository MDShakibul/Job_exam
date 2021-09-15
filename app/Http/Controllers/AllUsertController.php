<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AllUsertController extends Controller
{
    public function all_users()
    {
        $applicant_list = DB::table('users')->get();

        return view('admin.accept_reject', compact('applicant_list'));
    }

    public function block($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['is_verified' => 0]);
        return Redirect::to('/all_users')->with(session()->flash('alert-success', 'Oh No. You Block A User'));
    }

    public function ok($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['is_verified' => 1]);
        return Redirect::to('/all_users')->with(session()->flash('alert-success', 'Great. You Accept A User'));
    }
}
