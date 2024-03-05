<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
    public function  asckPermission(User $user)
    {
    
       $user->ascked_permission=true;
       $user->update();
       return redirect(RouteServiceProvider::CLIENT);

 
    }

    public function get_users(){
        $users=User::where('ascked_permission',false)->whereHas('roles', function ($query) {
            $query->where('name', 'client');
       })->get();
        $user_ascked=User::where('ascked_permission',true)->doesntHave('roles', 'and', function ($query) {
            $query->where('name', 'organosator');
        })->get();
        $organisator= User::whereHas('roles', function ($query) {
            $query->where('name', 'organosator');
       })->get();

        return view('Users.index',compact('users','user_ascked','organisator'));

    }
    public function give_permission(User $item){
        $item->removeRole('client');
       $item->assignRole('organosator');
       return redirect(RouteServiceProvider::HOME);

    }
    public function refiouse_permission(User $item){
        $item->ascked_permission=false;
        $item->update();
        return redirect(RouteServiceProvider::HOME);
 
     }
     public function validate_event(){
        $Events=Event::where('validated',false)->get();
        return view('Users.eventvalidation',compact('Events'));

     }
     public function confrime_event(Event $item){
        $item->validated=true;
        $item->update();
        return redirect()->route('validate_event')->with('success','Event validated successfuly !!');
     }

     public function delete_event(Event $item){
        $item->delete();
       
        return redirect()->route('validate_event')->with('success','Event deleted successfuly !!');
     }

     public function event_swhow(Event $item){
        $Event=$item;
        return view('Events.show',compact('Event'));
     }
}
