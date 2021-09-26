<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileSendController extends Controller
{


    public function sendfile($id)
    {
        $result = DB::table('employee_details')->first();
        //dd($id);
        // return $result;
        $data = array();
        $data['application_id'] = $id;
        $data['employee_details_id'] = $result->id;
        $data['position_id'] = $result->position_id;
        $data['employee_name'] = $result->employee_name;

        DB::table('sendfileemployee')->insert($data);
    }


    public function send_next_employee($id)
    {
        $send_id = $id;

        //dd($id);

        $posi_list = DB::table('position_details')->get();
        return view('confrim_send', compact(['posi_list', 'send_id']));
    }

    public function send_next_file(Request $request)
    {
        $data = array();
        $data['application_id'] = $request->application_id;
        $data['position_id'] = $request->position_type;
        $data['employee_name'] = $request->name;

        //dd($request->name);
        $result = DB::table('sendfileemployee')->insert($data);

        if ($result) {
            return redirect()->back()->with(session()->flash('alert-success', 'You did it successfully'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong.Please try again'));
        }
    }
}
