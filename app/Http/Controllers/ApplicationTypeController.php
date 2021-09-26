<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ApplicationTypeController extends Controller
{
    public function application_type()
    {
        return view('admin.application_type');
    }

    public function application_add(Request $request)
    {
        $data = array();
        $data['application_type'] = $request->application_type;
        $data['application_price'] = $request->application_price;

        if ($data) {
            DB::table('application_type')->insert($data);
            return Redirect::to('/application_type')->with(session()->flash('alert-success', 'You Creat a New Application Type'));
        }

        /* return view('admin.dashboard'); */
        return Redirect::to('/application_type')->with(session()->flash('alert-alart', 'OH NO. You make Something Wrong'));
    }

    public function application_all()
    {
        $application_list = DB::table('application_type')->get();
        //($user_list);
        return view('admin.all_application', compact('application_list'));
    }

    public function application_edit($id)
    {
        $app_info = DB::table('application_type')
            ->where('id', $id)
            ->first();
        return view('admin.update_application', compact('app_info'));
    }

    public function update_app(Request $request, $id)
    {
        $data = array();
        $data['application_type'] = $request->application_type;
        $data['application_price'] = $request->application_price;
        DB::table('application_type')->where('id', $id)->update($data);
        return Redirect::to('/application_all')->with(session()->flash('alert-success', 'Great. You Did It Successfully'));
    }

    public function delete_app($id)
    {
        DB::table('application_type')->where('id', $id)->delete();
        return response()->json(['status' => 'Select Item Deleted successfully']);
    }
}
