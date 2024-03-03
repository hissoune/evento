<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories=Category::all();
       return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Category::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('Categories.index')->with('sucsess','your category added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $Category)
    {
          return view('categories.edit',compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $Category)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $Category->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('Categories.index')->with('sucsess','your category added successfuly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return redirect()->route('Categories.index')->with('sucsess','your category added successfuly');

    }
}
