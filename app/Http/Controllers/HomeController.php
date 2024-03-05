<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $Events=Event::where('validated',true)->get();
        return view('welcome',compact('Events'));
    }
}
