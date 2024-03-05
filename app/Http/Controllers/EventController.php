<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Events=Event::where('users_id',Auth::id())->get();
        return view('Events.index',compact('Events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Categories=Category::all();
        return view('Events.create',compact('Categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validated=  $request->validate([
        'title' => 'required',
        'description' => 'required',
         'start_date' => ['required', 'date', 'after:'.now()],
          'end_date' => ['required', 'date', 'after:start_date'],
        'location' => 'required',
        'image' => 'required',
        'number_places' => 'required|numeric',
        'categories_id' => 'required|numeric',
        'status' => 'required',

       ]);
       if($request->hasFile('image')){
        $validated['image']=$request->file('image')->store('EventsImg','public');
        
    }   

       Event::create([

        'title' => $validated['title'],
        'description' =>$validated['description'],
        'start_date' => $validated['start_date'],
        'end_date' => $validated['end_date'],
        'location' => $validated['location'],
        'image' => $validated['image'],
        'number_places' =>$validated['number_places'],
        'categories_id' => $validated['categories_id'],
        'status' => $validated['status'],
        'users_id' => Auth::id(),
       ]);
           return redirect()->route('Events.index')->with('success','Event added successfuly !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $Event)
    {
        
       
    return view('Events.show',compact('Event'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $Event)
    {
        $Categories=Category::all();
       return view('Events.edit',compact('Categories','Event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $Event)
    {
        $validated=  $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required',
            'image' => 'nullable',
            'number_places' => 'required|numeric',
            'categories_id' => 'required|numeric',
            'status' => 'required',
    
           ]);
           if($request->hasFile('image')){
            $validated['image']=$request->file('image')->store('EventsImg','public');  
        } else{
            $validated['image']=$request->input('image');
        }  
        $Event->update([
            'title' => $validated['title'],
            'description' =>$validated['description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'location' => $validated['location'],
            'image' => $validated['image'],
            'number_places' =>$validated['number_places'],
            'categories_id' => $validated['categories_id'],
            'status' => $validated['status'],
            'users_id' => Auth::id(),
        ]);
        return redirect()->route('Events.index')->with('success','Event updated successfuly !!');

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $Event)
    {
        $Event->delete();
        return redirect()->route('Events.index')->with('success','Event deleted successfuly !!');

    }
}
