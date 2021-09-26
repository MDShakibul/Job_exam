<?php

namespace App\Http\Controllers;

use App\Models\Workflow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkFlowController extends Controller
{
    public function workflow_page()
    {
        $emp_name = DB::table('employee_login')->get();
        return view('admin.workflow', compact('emp_name'));
    }

    public function work_flow(Request $request)
    {
        $total_position = 20;


        for ($i = 0; $i <  $total_position; $i++) {
            $pos_name = "position_name" . $i;
            $emp_name = "employee_name" . $i;
            $emp_name_array = $request->$emp_name;

            if (isset($request->$pos_name) && isset($request->$emp_name)) {

                $data = array();
                $pos_name_array = $request->$pos_name;
                for ($j = 0; $j < count($pos_name_array); $j++) {
                    $position_name = $pos_name_array[$j];
                    $data['position_name'] = $position_name;
                    //dd($data);
                    $a = DB::table('position_details')->insertGetId($data);

                    for ($k = 0; $k < count($emp_name_array); $k++) {
                        $employee_name = $emp_name_array[$k];
                        $data1 = array();
                        $data1['position_id'] = $a;
                        $data1['employee_name'] = $employee_name;

                        $result = DB::table('employee_details')->insert($data1);
                    }
                }
            }
        }
        if ($result) {
            return redirect()->back()->with(session()->flash('alert-success', 'Successfully done this'));
        } else {
            return redirect()->back()->with(session()->flash('alert-success', 'Something doing wrong'));
        }
    }

    public function view_workflow()
    {
        //$workflow = DB::table('workflow')->get();
        //$newWorkFlow = array();
        $workflow = DB::table('position_details')
            ->join('employee_details', 'position_details.id', '=', 'employee_details.position_id')
            ->join('employee_login', 'employee_login.id', '=', 'employee_details.employee_name')
            ->select('position_details.*', 'employee_details.*', 'employee_login.employee_name')
            ->get()
            ->groupBy('position_name');

        $a = array();
        $b = array();
        $c = array();
        foreach ($workflow as $flow) {
            $string = "";
            $s = "";
            foreach ($flow as $no => $f) {
                $s = $f->position_name;
                $id = $f->position_id;
                $string .= $no + 1 . '.' . $f->employee_name . ' ';
            }
            array_push($a, $string);
            array_push($b, $s);
            array_push($c, $id);
        }

        //return $a;

        //return $workflow;
        //return $b;

        // dd($workflow);
        //return $workflow;
        return view('admin.view_workflow', compact(['a', 'b', 'c']));
    }

    public function delete($id)
    {
        DB::table('employee_details')->where('position_id', $id)->delete();
        return redirect()->back()->with(session()->flash('alert-success', 'Your Successfully Delete This'));
    }

    public function edit_work($id)
    {

        $workflow_infos = DB::table('position_details')
            ->join('employee_details', 'position_details.id', '=', 'employee_details.position_id')
            ->join('employee_login', 'employee_login.id', '=', 'employee_details.employee_name')
            ->select('position_details.*', 'employee_details.*', 'employee_login.employee_name', 'employee_login.id as employee_id')
            ->where('employee_details.position_id', $id)
            ->get();

        //dd($workflow_infos);

        $employee_infos = DB::table('employee_login')->get();

        return view('admin.edit_workflow', compact(['workflow_infos', 'employee_infos']));
    }

    public function update_workflow(Request $request, $id)
    {
        DB::table('employee_details')->where('position_id', $id)->delete();
        
        $total_position = 20;

        for ($i = 0; $i < $total_position; $i++) {
            $pos_name = "position_name" . $i;
            $emp_name = "employee_name" . $i;
            $emp_name_array = $request->$emp_name;

            // dd(count($emp_name_array));

            if (isset($request->$pos_name) && isset($request->$emp_name)) {

                $data = array();
                $pos_name_array = $request->$pos_name;
                for ($j = 0; $j < count($pos_name_array); $j++) {
                    $position_name = $pos_name_array[$j];
                    $data['position_name'] = $position_name;
                    //dd($data);
                   // $a = DB::table('position_details')->insertGetId($data);
                    //dd($a);

                    for ($k = 0; $k < count($emp_name_array); $k++) {


                        $employee_name = $emp_name_array[$k];
                        $data1 = array();
                        $data1['position_id'] = $id;
                        $data1['employee_name'] = $employee_name;

                        $result = DB::table('employee_details')->insert($data1);
                    }
                }
            }
        }

        if ($result) {
            return redirect()->back()->with(session()->flash('alert-success', 'Successfully done this'));
        } else {
            return redirect()->back()->with(session()->flash('alert-success', 'Something doing wrong'));
        }
    }
}



