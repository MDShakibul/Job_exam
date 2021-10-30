<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Application_type;

class ApplicationTypeController extends Controller
{
    public function application_type()
    {
        return view('admin.application_type');
    }

    public function application_add(Request $request)
    {
        //dd('hi');
        $data = New Application_type;
        $data -> application_type = $request->application_type;
        $data -> application_price = $request->application_price;

        if ($data) {
            $data -> save();
            return Redirect::to('application/application_type')->with(session()->flash('alert-success', 'You Creat a New Application Type'));
        }

        /* return view('admin.dashboard'); */
        return Redirect::to('application/application_type')->with(session()->flash('alert-alart', 'OH NO. You make Something Wrong'));
    }

    public function application_all()
    {
        $application_list = Application_type::all();
        //($user_list);
        return view('admin.all_application', compact('application_list'));
    }

    public function application_edit($id)
    {
        $app_info = Application_type::find($id);
        return view('admin.update_application', compact('app_info'));
    }

    public function update_app(Request $request, $id)
    {

        $data = Application_type::find($id);

        $data -> application_type = $request->application_type;
        $data -> application_price = $request->application_price;
        $data -> save();
        return Redirect::to('application/application_all')->with(session()->flash('alert-success', 'Great. You Did It Successfully'));
    }

    public function delete_app($id)
    {
        //DB::table('application_type')->where('id', $id)->delete();
        Application_type::destroy($id);
        return response()->json(['status' => 'Select Item Deleted successfully']);
    }
}
