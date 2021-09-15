<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class UserCommentController extends Controller
{
    public function user_comment($id)
    {
        return view('user_comment', compact('id'));
    }

    public function view_comment(Request $request)
    {
        $data = array();

        $data['user_comment'] = $request->user_comment;
        $data['user_id'] = $request->user_id;

        // dd($data);
        $image = $request->file('user_image_comment');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['user_image_comment'] = $image_url;
                DB::table('user_comment')->insert($data);
                return redirect()->back()->with('message', 'Add Comment Successfully');
            }
        }

        //dd($data);
        $data['user_image_comment'] = '';
        DB::table('user_comment')->insert($data);
        return redirect()->back()->with('message', 'Add Comment Successfully');
    }


    public function all_comment($id)
    {
        //dd($id);

        if ($id) {

            /* $view_comment =  array(); */
            $view_comment = DB::table('admin_comment')
                ->join('user_comment', 'admin_comment.comment_user_id', '=', 'user_comment.user_id')
                ->select('admin_comment.*', 'user_comment.*')
                ->where('admin_comment.comment_user_id', '=', $id)
                ->get();

            //dd($view_comment);


            return view('all_comments', compact('view_comment'));
        }

        return view('user_comment');
    }

    public function edit_user_details($id)
    {

        $app_info = DB::table('user_details')
            ->where('id', $id)
            ->first();

        $app_list = DB::table('application_type')->get();
        //return view('user_index', compact(['app_list']));
        return view('edit_user_details', compact(['app_info', 'app_list']));
    }
}
