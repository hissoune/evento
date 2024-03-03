<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user_ascked=User::where('ascked_permission',true)->doesntHave('permissions', 'and', function ($query) {
            $query->where('name', 'organosate');
        })->get();
        $organisator= User::whereHas('permissions', function ($query) {
            $query->where('name', 'organosate');
       })->get();

        return view('Users.index',compact('users','user_ascked','organisator'));

    }
    public function give_permission(User $item){
       $item->givePermissionTo('organosate');
       return redirect(RouteServiceProvider::HOME);

    }
    public function refiouse_permission(User $item){
        $item->ascked_permission=false;
        $item->update();
        return redirect(RouteServiceProvider::HOME);
 
     }
}
