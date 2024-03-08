<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class providerController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
        // dd($provider);
    }
    public function callback($provider)
    {

        $socialuser = Socialite::driver($provider)->user();
       

        
        $user = User::where('email', $socialuser->email)->first();
        if (!$user) {
            $user = User::updateOrCreate([
                'provider_id' => $socialuser->id,
                'provider' => $provider,
            ], [
                'name' => $socialuser->name,
                'username' => User::GenerateUsername($socialuser->nickname),
                'email' => $socialuser->email,
                'provider_token' => $socialuser->token,
                'email_verified_at' => null,
                'abonnement_id'=>1,
                'start_date_abonnement'=>now(),
            'end_date_abonnement'=>now()->addMinutes(3),
            ]);
            
            $user->assignRole('client');
            event(new Registered($user));
            Auth::login($user);

          
            return redirect()->intended(RouteServiceProvider::CLIENT);      
        } else {
            Auth::login($user);

            
            if($user->hasRole('organisator')){
                return redirect()->intended(RouteServiceProvider::ORGANISATOR);
            }elseif($user->hasRole('admin')){
                return redirect()->intended(RouteServiceProvider::HOME);
    
            }else{
                return redirect()->intended(RouteServiceProvider::CLIENT);

            }
                
        }
        
    }
}
