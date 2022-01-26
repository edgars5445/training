<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('home',compact('categories'));
    }

    public function openCategory(Request $request)
    {
        $category = $request->category;
        $data=Category::where('name','=',$category)->get()->first();
        $posts=Post::all();
        $categoryID=$data->id;
        $categoryName = $data->name; 
        $sections = Section::where('category_id', '=', $categoryID)->get();
        return view('category', compact('sections','categoryName','posts'));

    }

    public function deleteCategory(Request $request){
        $categoryID = $request->cat_id;
        $sections = Section::where('category_id','=',$categoryID)->get();

        foreach($sections as $section){
            Post::where('section_id','=',$section->id)->delete();
        }
        foreach($sections as $section){
            $section->delete();
        };

        Category::where('id','=',$categoryID)->delete();

        return redirect()->intended();
    }

    public function editCategory(Request $request)
    {
        Category::where('id', '=', $request->cat_id)
                ->update([
                    'name' => $request->cat_name,
                ]);
        return redirect()->intended();
    }

    public function newPost(Request $request)
    {
        return redirect()->intended();
    }
    
}
