<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function employee_page()
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

        /* return view('admin.dashboard'); */
        return Redirect::to('/employee_page')->with(session()->flash('alert-alart', 'OH NO. You make Something Wrong'));
    }

    public function getemployee($id)
    {
        //dd("hi");
        $id = $_GET['id'];
        $res = DB::table('position')
            ->join('employee', 'position.id', '=', 'employee.position_type')
            ->where('position.id', $id)
            ->get();
        return response()->json($res);
    }
}
