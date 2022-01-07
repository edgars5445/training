<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        // if($request->session->has('categoryId')) 
        // {
        //     $categoryId =  $request->session->get('categoryId');
        // } 
        
        return view('home',compact('categories'));
    }
}
