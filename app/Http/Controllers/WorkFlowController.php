<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkFlowController extends Controller
{
    public function workflow_page()
    {
        return view('admin.workflow');
    }
}
