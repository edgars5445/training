<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('section',compact('posts'));
    }
}
