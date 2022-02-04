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
        if($data){
        $posts=Post::all();
        $categoryID=$data->id;
        $categoryName = $data->name; 
        $sections = Section::where('category_id', '=', $categoryID)->get();
        
        return view('category', compact('sections','categoryName','posts'));
        }
        return redirect()->intended();

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

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->section_id = $request->section_select;
        $post->price = $request->price;
        $post->save();

        $sectionData = Section::where('id','=',$request->section_select)->get();
        $sectionName = $sectionData[0]['name'];
        $sectionID = $sectionData[0]['id'];
        $categoryData = Category::where('id','=',$sectionID)->get();
        $categoryName = $categoryData[0]['name'];
        $posts = Post::where('section_id', '=', $sectionID)->paginate(10);
        $post = Post::latest('id')->first();

        return redirect('/' . $categoryName .'/'.$sectionName.'?page=' . $posts->lastpage() .'#'. $post->id);
    }

    public function newPostAjax(Request $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->section_id = $request->section_id;
        $post->price = $request->price;
        $post->save();

        return array($request->image, $request->title, $request->description,  $request->price);
    }
    
}
