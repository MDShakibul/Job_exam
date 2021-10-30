<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User_detail;
use App\Models\Application_type;

class UserDetailsController extends Controller
{
    public function form()
    {
        $app_list = Application_type :: all();

        return view('user_index', compact('app_list'));
    }

    public function user_details(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'application_type' => ['required'],
            'application_price' => ['required'],
            'father_name' => ['required'],
            'mother_name' => ['required'],
            'amount_land' => ['required'],
            'nid_number' => ['required'],
            'mobile_number' => ['required', 'max:11'],
            'image.*' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'image' => ['required'],
            'pdf' => ['required', 'mimes:pdf']
        ])->validate();

        $user = New User_detail;

        //$data = array();
        $user -> user_id = $request->user_id;
        $user -> application_type = $request->application_type;
        $user -> application_price = $request->application_price;
        $user -> application_number = $request->application_number  = hexdec(uniqid());
        $user -> father_name = $request->father_name;
        $user -> mother_name = $request->mother_name;
        $user -> amount_land = $request->amount_land;
        $user -> nid_number = $request->nid_number;
        $user -> mobile_number = $request->mobile_number;
        $user -> description = $request->description;

        $count = intval(count((array)$request->file('image')));

        $images = array();
        for ($i = 0; $i < $count; $i++) {
            $image = $request->file('image');
            $upload_path = 'image/';
            $image_name = hexdec(uniqid());

            $ext = strtolower($image[$i]->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;

            $image_url = $upload_path . $image_full_name;
            $success_img = $image[$i]->move($upload_path, $image_full_name);
            array_push($images, $image_url);
        }
/*
        $data['image'] = implode(",", $images); */
        $user -> image = implode(",", $images);


        $document = $request->file('pdf');
        if ($document) {
            $document_name = hexdec(uniqid());
            $ext = strtolower($document->getClientOriginalExtension());
            $document_full_name = $document_name . '.' . $ext;
            $upload_path = 'pdf/';
            $document_url = $upload_path . $document_full_name;
            $success_pdf = $document->move($upload_path, $document_full_name);
        }

        $user -> pdf = $document_url;


        $multi = array();
        if ($request->hasFile('file')) {
            foreach ($request->file as $file) {
                $file_doc = hexdec(uniqid());
                $ext = strtolower($file->getClientOriginalExtension());
                $file_full_name = $file_doc . '.' . $ext;;
                $upload_path = 'file/';
                $file_url = $upload_path . $file_full_name;
                $file->move($upload_path, $file_full_name);
                array_push($multi, $file_url);
            }
        }

        $user -> file = implode(",", $multi);


        if (isset($success_img) && isset($success_pdf)) {
           /*  DB::table('user_details')->insert($data); */
           $user -> save();
            $price = $user -> application_price;

            /* $res = DB::table('position')
            ->join('employee', 'position.id', '=', 'employee.position_type')
            ->where('position.id', $id)
            ->get(); */

            /* $application_name = DB::table('application_type')
                ->join('user_details', 'user_details.application_type', '=', 'application_type.id')
                ->select('application_type.application_type')
                ->where('user_details.application_type', $request->application_type)
                ->get(); */
            // dd($application_name);



            Stripe::setApiKey('sk_test_51JauHJBLF5GQ9vxakUzFNGZ4iRjC76hTH8yh6Q9Midfp4Y4oDhcTeT67wDy1WZmnXonDOV7vpzqzGoQy1ubIwJI600fWF3i7Bg');

            $amount = $price;
            $amount *= 100;
            $amount = (int) $amount;

            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'BDT',
                'description' => 'Payment From MySite',
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;

            return view('checkout.credit-card', compact(['intent', 'price']));
        }

        return Redirect::to('/form')->with('message', 'You Did Something Wrong. Please Check Again');
    }



    public function view_profile($user_id)
    {

        //dd('hi');
       /*  $user_list = DB::table('user_details')
            ->where('user_id', $user_id)->get();
        return view('short_view_info', compact('user_list')); */

        $user_list = User_detail::where('user_id', $user_id)->get();
        return view('short_view_info', compact('user_list'));



    }

    public function findPrice(Request $request)
    {

        //dd($request->all());
        $p = Application_type::select('application_price')
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

        //$data = array();

        $user = User_detail::find($id);

        $user -> user_id = $request->user_id;
        $user -> application_type = $request->application_type;
        $user -> application_price = $request->application_price;
        $user -> application_number = $request->application_number  = hexdec(uniqid());
        $user -> father_name = $request->father_name;
        $user -> mother_name = $request->mother_name;
        $user -> amount_land = $request->amount_land;
        $user -> nid_number = $request->nid_number;
        $user -> mobile_number = $request->mobile_number;
        $user -> description = $request->description;


        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success_img = $image->move($upload_path, $image_full_name);
        }
        $user -> image = $image_url;



        $document = $request->file('pdf');
        if ($document) {
            $document_name = hexdec(uniqid());
            $ext = strtolower($document->getClientOriginalExtension());
            $document_full_name = $document_name . '.' . $ext;
            $upload_path = 'pdf/';
            $document_url = $upload_path . $document_full_name;
            $success_pdf = $document->move($upload_path, $document_full_name);
        }

        // dd($document_url);

        $user -> pdf = $document_url;


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

        $user -> file = implode(",", $multi);

        if (isset($success_img) && isset($success_pdf)) {
            //DB::table('user_details')->where('id', $id)->update($data);
            $user -> save();

            return redirect()->back()->with('message', 'You Update The Form Successfully');
        }

        return redirect()->back()->with('message', 'You Did Something Wrong. Please Check Again');
    }
}
