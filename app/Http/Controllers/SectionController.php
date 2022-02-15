<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Pagination\Paginator;
use Response;

class SectionController extends Controller
{
    public function index(Request $request, $category, $section)
    {
        $temp = Section::where('name','=',$section)->get();
        $sectionID=$temp[0]['id'];
        $posts = Post::where('section_id', '=', $sectionID)->paginate(10);
        $category = ucfirst($category);
        $section = ucfirst($section);
        return view('section',compact('posts','category','section'));
    }

    public function filter(Request $request,$category,$section)
    {
        $temp = Section::where('name','=',$section)->get();
        $sectionID=$temp[0]['id'];

        if($request->has('priceBy')){
            $priceFilter = $request->priceBy;
        } else {
            $priceFilter = 0;
        }

        if($request->has('search')){
            $searchFilter = $request->search;
        } else {
            $searchFilter = 0;
        }

        if($request->has('priceBy')){
            $posts = new Post();
            if($request->priceBy == 1){
                $posts = Post::where('section_id', '=', $sectionID)->orderBy('price','asc');
            } else if ($request->priceBy == 2){
                $posts = Post::where('section_id', '=', $sectionID)->orderBy('price','desc'); 
            }
        } else {
            $posts = Post::where('section_id', '=', $sectionID)->orderBy('id','asc');
        }
       
        if($request->has('search')){
            $posts = $posts->where('title', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('section',[$category,$section],compact('posts','category','section','priceFilter','searchFilter'));
    }

    public function reportUser(Request $request)
    {
        if(Report::where('post_id','=',$request->postId)->exists()){
            return;
        }
        
        $report = new Report();
        $report->report = $request->report;
        $report->post_id = $request->postId;
        $report->user_id = $request->userId;
        $report->save();
        return;
    }
}
