<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class UserDetailsController extends Controller
{
    public function form()
    {
        $app_list = DB::table('application_type')->get();

        return view('user_index', compact('app_list'));
        //return view('user_index');
    }

    public function user_details(Request $request)
    {

        $request->validate([
            'application_type' => ['required'],
            'application_price' => ['required'],
            'father_name' => ['required'],
            'mother_name' => ['required'],
            'amount_land' => ['required'],
            'nid_number' => ['required'],
            'mobile_number' => ['required', 'max:11'],
            'image' => ['required', 'mimes:jpeg,png,jpg'],
            'pdf' => ['required', 'mimes:pdf']
        ]);

        $data = array();
        $data['user_id'] = $request->user_id;
        $data['application_type'] = $request->application_type;
        $data['application_price'] = $request->application_price;
        $data['application_number'] = $request->application_number  = hexdec(uniqid());
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['amount_land'] = $request->amount_land;
        $data['nid_number'] = $request->nid_number;
        $data['mobile_number'] = $request->mobile_number;
        $data['description'] = $request->description;


        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success_img = $image->move($upload_path, $image_full_name);
        }
        $data['image'] = $image_url;



        $document = $request->file('pdf');
        if ($document) {
            $document_name = hexdec(uniqid());
            $ext = strtolower($document->getClientOriginalExtension());
            $document_full_name = $document_name . '.' . $ext;
            $upload_path = 'pdf/';
            $document_url = $upload_path . $document_full_name;
            $success_pdf = $document->move($upload_path, $document_full_name);
        }
        $data['pdf'] = $document_url;


        $multi = array();;
        if ($request->hasFile('file')) {
            foreach ($request->file as $file) {
                $file_doc = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $file_full_name = $file_doc . '.' . $ext;;
                $upload_path = 'file/';
                $file_url = $upload_path . $file_full_name;
                $file->move($upload_path, $file_full_name);
                //$data['file'] = $file_url;
                array_push($multi, $file_url);
                // print_r($file[]); */
            }
        }


        $data['file'] = implode(",", $multi);


        if (isset($success_img) && isset($success_pdf)) {
            DB::table('user_details')->insert($data);
            return Redirect::to('/form')->with('message', 'You Fill Up The Form Successfully');
        }

        return Redirect::to('/update_profile')->with('message', 'You Did Something Wrong. Please Check Again');
    }


    public function view_profile($user_id)
    {
        $user_list = DB::table('user_details')
            ->where('user_id', $user_id)->get();
        return view('short_view_info', compact('user_list'));
    }

    public function findPrice(Request $request)
    {

        //dd($request->all());
        $p = DB::table('application_type')
            ->select('application_price')
            ->where('id', $request->id)
            ->first();

        return response()->json($p);
    }

    public function update_user_details(Request $request, $id)
    {

        $request->validate([
            'application_type' => ['required'],
            'application_price' => ['required'],
            'father_name' => ['required'],
            'mother_name' => ['required'],
            'amount_land' => ['required'],
            'nid_number' => ['required'],
            'mobile_number' => ['required', 'max:11'],
            'image' => ['required', 'mimes:jpeg,png,jpg'],
            'pdf' => ['required', 'mimes:pdf']
        ]);

        $data = array();
        $data['user_id'] = $request->user_id;
        $data['application_type'] = $request->application_type;
        $data['application_price'] = $request->application_price;
        $data['application_number'] = $request->application_number  = hexdec(uniqid());
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['amount_land'] = $request->amount_land;
        $data['nid_number'] = $request->nid_number;
        $data['mobile_number'] = $request->mobile_number;
        $data['description'] = $request->description;


        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success_img = $image->move($upload_path, $image_full_name);
        }
        $data['image'] = $image_url;



        $document = $request->file('pdf');
        if ($document) {
            $document_name = hexdec(uniqid());
            $ext = strtolower($document->getClientOriginalExtension());
            $document_full_name = $document_name . '.' . $ext;
            $upload_path = 'pdf/';
            $document_url = $upload_path . $document_full_name;
            $success_pdf = $document->move($upload_path, $document_full_name);
        }
        $data['pdf'] = $document_url;


        $multi = array();;
        if ($request->hasFile('file')) {
            foreach ($request->file as $file) {
                $file_doc = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $file_full_name = $file_doc . '.' . $ext;;
                $upload_path = 'file/';
                $file_url = $upload_path . $file_full_name;
                $file->move($upload_path, $file_full_name);
                //$data['file'] = $file_url;
                array_push($multi, $file_url);
                // print_r($file[]); */
            }
        }


        $data['file'] = implode(",", $multi);


        if (isset($success_img) && isset($success_pdf)) {
            DB::table('user_details')->where('id', $id)->update($data);
            return redirect()->back()->with('message', 'You Update The Form Successfully');
        }

        return redirect()->back()->with('message', 'You Did Something Wrong. Please Check Again');
    }
}
