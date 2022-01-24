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

    public function openCategory(Request $request, $category)
    {
        $data=Category::where('name','=',$category)->get()->toArray();
        $categoryID=$data[0]['id'];
        $categoryName = strtolower($data[0]['name']); 
        $sections = Section::where('category_id', '=', $categoryID)->get();
        
        return view('category', compact('sections','categoryName'));
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
}
