<?php

namespace App\Http\Controllers;

use App\Models\User_detail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class FormAcceptController extends Controller
{

    public function success($id)
    {
        User_detail::find($id)
            ->update(['is_verified' => 0]);

        $user_list = User_detail::join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return redirect()->back()->with(['user_list' => $user_list])->with(session()->flash('alert-success', 'You put a form in pending.'));

    }

    public function pending($id)
    {
        User_detail::find($id)->update(['is_verified' => 1]);

        $user_list = User_detail::join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return redirect()->back()->with(['user_list' => $user_list])->with(session()->flash('alert-success', 'You Successfully confrim a form.'));
    }

    public function reject($id)
    {
        User_detail::find($id)
            ->update(['is_verified' => 2]);

        $user_list = User_detail::join('application_type', 'user_details.application_type', 'application_type.id')
            ->select('user_details.*', 'application_type.application_type as app_type')
            ->get();
        return redirect()->back()->with(['user_list' => $user_list])->with(session()->flash('alert-success', 'Successfully you reject a form'));

    }
}
