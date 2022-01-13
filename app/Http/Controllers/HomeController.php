<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('home',compact('categories'));
    }

    public function openCategory(Request $request)
    {
        $categoryID=$request->input('categoryID');
        $sections = Section::where('category_id', '=', $categoryID)->get();
        return view('category', compact('sections','categoryID'));
    }
}
