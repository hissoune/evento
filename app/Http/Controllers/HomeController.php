<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
        $Events=Event::where('validated',true)->paginate(3);
        return view('welcome',compact('Events','categories'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchInput');
        $searchResults = Event::where('title', 'like', '%' . $searchTerm . '%')->get();
        return response()->json($searchResults);
    }
    public function filter(Category $category){
        $categories=Category::all();
        $Events=Event::where('categories_id',$category->id)->where('validated',true)->paginate(3);
        return view('welcome',compact('Events','categories'));

       
    }
}
