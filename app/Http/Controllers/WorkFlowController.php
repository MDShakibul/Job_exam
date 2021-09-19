<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkFlowController extends Controller
{
    public function workflow_page()
    {
        $posi_list = DB::table('position')->get();
        return view('admin.workflow', compact('posi_list'));
        //return view('admin.workflow');
    }
}
