<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

trait updatepassword {
    

    public function updateprofilepassword(){
        $credentials = request()->validate([
            'current_password' => ['required','current_password'] ,
            'password'         => ['required','confirmed']
        ]);
        return auth()->user()->update(['password' => Hash::make($credentials['password'])]); 
    } 
}