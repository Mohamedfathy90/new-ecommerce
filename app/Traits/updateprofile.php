<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


trait updateprofile {
    
    use image;
    public function updateprofiledata($role){
        $credentials= request()->validate([
            'name'       =>['required','min:4'],
            'username'   =>['required','min:4','unique:users,username,'.Auth::id()],
            'email'      =>['email','required','unique:users,email,'.Auth::id()]
        ]);    
        $credentials['phone']=request('phone');
     
        if(request()->has('image')){
            $this->deleteimage(auth()->user()->image);
            $credentials['image']= $this->saveimage("profile_images/".$role."/");
        }
        
        $user = auth()->user()->update($credentials);

        return $user ;
        
    } 
}