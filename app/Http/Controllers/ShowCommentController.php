<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ShowCommentController extends Controller
{
    public function show_comment($id)
    {
        /* $view_comment = DB::table('admin_comment')
            ->join('user_comment', 'admin_comment.comment_user_id', '=', 'user_comment.user_id')
            ->select('admin_comment.*', 'user_comment.*')
            ->where('admin_comment.comment_user_id', '=', $id)
            ->get();

        return view('all_comments', compact('view_comment')); */

        $view_user_comment = DB::table('comments')
            ->select('comments.*')
            ->where('comments.comment_by', '=', $id)
            ->get();

        $view_admin_comment = DB::table('comments')
            ->select('comments.*')
            ->where('comments.comment_to', '=', $id)
            ->where('comments.comment_by', '!=', $id)
            ->get();

        return view('all_comments', compact(['view_user_comment', 'view_admin_comment']));
    }


    public function admin_show_comment($id)
    {
        /* $view_comment = DB::table('admin_comment')
            ->join('user_comment', 'admin_comment.comment_user_id', '=', 'user_comment.user_id')
            ->select('admin_comment.*', 'user_comment.*')
            ->where('admin_comment.comment_user_id', '=', $id)
            ->get();

        return view('all_comments', compact('view_comment')); */
       // dd($id);

        $view_user_comment = DB::table('comments')
            ->select('comments.*')
            ->where('comments.comment_by', '=', $id)
            ->get();

        $view_admin_comment = DB::table('comments')
            ->select('comments.*')
            ->where('comments.comment_to', '=', $id)
            ->where('comments.comment_by', '!=', $id)
            ->get();

        return view('admin.admin_all_comments', compact(['view_user_comment', 'view_admin_comment']));
    }
}
