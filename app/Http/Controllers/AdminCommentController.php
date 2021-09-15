<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminCommentController extends Controller
{
    public function comment_page($id)
    {

        return view('admin.comment', compact('id'));
    }

    /* public function comment(Request $request)
    {
        $data = array();

        $data['comment'] = $request->comment;
        $data['comment_user_id'] = $request->comment_user_id;

        $image = $request->file('image_comment');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['image_comment'] = $image_url;
                DB::table('admin_comment')->insert($data);
                return redirect()->back();
            }
        }
        $data['image_comment'] = '';
        DB::table('admin_comment')->insert($data);
        return redirect()->back();


        //return view('/admin.comment');
    } */

    public function comments(Request $request)
    {
        $data = array();

        $data['comment_description'] = $request->comment_description;
        $data['comment_to'] = $request->comment_to;
        $data['comment_by'] = $request->comment_by;

        //dd($data);

        $image = $request->file('comment_file');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['comment_file'] = $image_url;
                DB::table('comments')->insert($data);
                return redirect()->back()->with(session()->flash('alert-success', 'Great. You Successfully Add Comment'));
            }
        }
        $data['comment_file'] = '';
        DB::table('comments')->insert($data);
        return redirect()->back()->with(session()->flash('alert-success', 'Great. You Successfully Add Comment'));
    }
}
