<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
           
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
        
            $user = Socialite::driver('google')->stateless()->user();
            
             dd($user);
            $finduser = User::where('google_id', $user->id)->first();
         
            if($finduser){
         
                Auth::login($finduser);
       
                return redirect()->intended('/');
         
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'email' => $user->email,
                        'username' => $user->name,
                        'image' => $user->avatar_original . "&access_token={$user->token}",
                        'facebook_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('/');
            }
       
        } 
        catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
