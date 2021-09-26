<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SendFileController extends Controller
{
    public function send($id)
    {
        $posi_list = DB::table('position')->get();
        $app_list = DB::table('application_type')->get();
        $app_info = DB::table('user_details')
            ->where('id', $id)
            ->first();

        return view('admin.send_to_employee', compact(['posi_list', 'app_list', 'app_info']));
    }

    public function send_file(Request $request)
    {

        $data = array();
        $data['position_type'] = $request->position_type;
        $data['name'] = $request->name;
        $data['application_type'] = $request->application_type;
        $data['application_price'] = $request->application_price;
        $data['application_number'] = $request->application_number  = hexdec(uniqid());
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['amount_land'] = $request->amount_land;
        $data['nid_number'] = $request->nid_number;
        $data['mobile_number'] = $request->mobile_number;
        $data['description'] = $request->description;
        $data['comment'] = $request->comment;

        $data['pdf'] = $request->old_file;

        /* $document = $request->file('pdf'); */


        if ($data) {
            DB::table('send_file')->insert($data);
            return redirect()->back()->with('message', 'You Update The Form Successfully');
        } else {
            return redirect()->back()->with('message', 'You Did Something Wrong. Please Check Again');
        }



        /* if ($document) {
            $document_name = hexdec(uniqid());
            $ext = strtolower($document->getClientOriginalExtension());
            $document_full_name = $document_name . '.' . $ext;
            $upload_path = 'pdf/';
            $document_url = $upload_path . $document_full_name;
            $success_pdf = $document->move($upload_path, $document_full_name);
            
            unlink($old_file);
            if (isset($success_pdf)) {
                DB::table('send_file')->insert($data);
                return redirect()->back()->with('message', 'You Update The Form Successfully');
            }

            return redirect()->back()->with('message', 'You Did Something Wrong. Please Check Again');
        } else {
            DB::table('send_file')->insert($data);
            return redirect()->back()->with('message', 'You Update The Form Successfully');
        }

        return redirect()->back()->with('message', 'You Did Something Wrong. Please Check Again'); */
    }

    /* public function application_edit($id)
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
    } */
}
