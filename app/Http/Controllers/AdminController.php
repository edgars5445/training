<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;

class AdminController extends Controller
{
    public function adminTickets (Request $request)
    {
        $reports = Report::orderBy('id','asc')->get();
        $posts = Post::all();
        $categories = Category::all();
        $sections = Section::all();
        return view('adminTickets',compact('reports','posts','categories','sections'));
    }

    public function adminUsers (Request $request)
    {
        $users = User::all();
        return view('adminUsers', compact('users'));
    }

    public function reportDismiss(Request $request)
    {
        Report::find($request->report_id)->delete();
        return response(200);
        // ari vaig, kad response failed uztaisit
    }

    public function reportResolve(Request $request)
    {
        $checkValue = $request->check_box_value;
        if($checkValue == 'true'){
            Post::find($request->post_id)->delete();
            Report::find($request->report_id)->delete();
            return response('The post is gone', 200);
        } 

        $post = Post::find($request->post_id);
        $post->section_id = $request->section_id;
        $post->save();

        Report::find($request->report_id)->delete($request->report_id);
        // ari vaig, kad response failed uztaisit
        return response(200); 
    }
}
