<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeLoginController extends Controller
{
    public function employee_login()
    {
        $posi_list = DB::table('position')->get();
        return view('emplyee_login', compact('posi_list'));
    }

    public function employee_page(Request $request)
    {
        $employee_email = $request->employee_email;
        $employee_password = $request->employee_password;

        // dd($position_type);

        $result = DB::table('employee_login')
            ->where('employee_email', $employee_email)
            ->where('employee_password', $employee_password)
            ->first();

        //dd($result);



        if ($result) {

            $request->session()->put('id', $result->id);
            // dd($result);

            return view('file');
        } else {
            return redirect()->back();
        }
    }

    public function check_file($id)
    {

        //dd($id);
        $files = DB::table('sendfileemployee')
            ->join('user_details', 'sendfileemployee.application_id', '=', 'user_details.id')
            ->join('application_type', 'user_details.application_type', '=', 'application_type.id')
            ->select('sendfileemployee.*', 'user_details.*', 'application_type.*')
            ->where('sendfileemployee.employee_name', $id)
            ->get();

        //dd($files);
        return view('file_view', compact('files'));
    }
}
