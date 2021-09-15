<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FormAcceptController extends Controller
{

    public function success($id)
    {
        DB::table('user_details')
            ->where('id', $id)
            ->update(['is_verified' => 0]);

        $user_list = DB::table('user_details')
            ->join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return view('admin.dashboard', compact('user_list'))->with(session()->flash('alert-success', 'You put a form in pending.'));
        //return redirect()->back()->with(session()->flash('alert-success', 'You put a form in pending.'));
    }

    public function pending($id)
    {
        DB::table('user_details')
            ->where('id', $id)
            ->update(['is_verified' => 1]);

        $user_list = DB::table('user_details')
            ->join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return view('admin.dashboard', compact('user_list'))->with(session()->flash('alert-success', 'You Successfully confrim a form.'));
        //return redirect()->back()->with(session()->flash('alert-success', 'You Successfully confrim a form.'));
    }

    public function reject($id)
    {
        DB::table('user_details')
            ->where('id', $id)
            ->update(['is_verified' => 2]);

        $user_list = DB::table('user_details')
            ->join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return view('admin.dashboard', compact('user_list'))->with(session()->flash('alert-success', 'Successfully you reject a form'));
        //return redirect()->back()->with(session()->flash('alert-success', 'Successfully you reject a form'));
    }
}
