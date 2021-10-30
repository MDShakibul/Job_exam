<?php

namespace App\Http\Controllers;

use App\Models\Position_detail;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /* public function employee_page()
    {

        // dd("hi");
        $posi_list = DB::table('position')->get();
        return view('admin.add_employee', compact('posi_list'));
    }

    public function employee_add(Request $request)
    {

        //dd("hi");
        $data = array();
        $data['position_type'] = $request->position_type;
        $data['employee_name'] = $request->employee_name;

        if ($data) {
            DB::table('employee')->insert($data);
            return Redirect::to('/employee_page')->with(session()->flash('alert-success', 'You Creat a New Position Type'));
        }

        /* return view('admin.dashboard'); 
        return Redirect::to('/employee_page')->with(session()->flash('alert-alart', 'OH NO. You make Something Wrong'));
    } */

    public function getemployee($id)
    {
        //dd("hi");
        $id = $_GET['id'];
        /*  $res = DB::table('position_details')
            ->join('employee_details', 'position_details.id', '=', 'employee_details.position_id')
            ->join('employee_login', 'employee_login.id', '=', 'employee_details.name')
            ->select('position_details.*', 'employee_details.*', 'employee_login.employee_name')
            ->where('position_details.id', $id)
            ->get(); */

        $res = Position_detail :: join('employee_details', 'position_details.id', '=', 'employee_details.position_id')
            ->join('employee_login', 'employee_login.id', '=', 'employee_details.employee_name')
            ->select('position_details.*', 'employee_details.*', 'employee_login.*')
            ->where('position_details.id', $id)
            ->get();
        return response()->json($res);
    }
}
