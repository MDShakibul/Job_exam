<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PositionController extends Controller
{
    public function position_page()
    {
        return view('admin.add_position');
    }


    public function position_add(Request $request)
    {

        //dd("hi");
        $data = array();
        $data['position_type'] = $request->position_type;

        if ($data) {
            DB::table('position')->insert($data);
            return Redirect::to('/position_page')->with(session()->flash('alert-success', 'You Creat a New Position Type'));
        }

        /* return view('admin.dashboard'); */
        return Redirect::to('/position_page')->with(session()->flash('alert-alart', 'OH NO. You make Something Wrong'));
    }
}
