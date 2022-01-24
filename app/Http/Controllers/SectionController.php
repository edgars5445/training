<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;

class SectionController extends Controller
{
    public function index(Request $request, $category, $section)
    {
        $temp = Section::where('name','=',$section)->get();
        $sectionID=$temp[0]['id'];
        $posts = Post::where('section_id', '=', $sectionID)->get();
        return view('section',compact('posts'));
    }
}
