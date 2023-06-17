<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\fileExists;

trait updateprofile {
    
    public function updateprofiledata($role){
        $credentials= request()->validate([
            'name'       =>['required','min:4'],
            'username'   =>['required','min:4','unique:users,username,'.Auth::id()],
            'email'      =>['email','required','unique:users,email,'.Auth::id()]
        ]);    
        $credentials['phone']=request('phone');
     
        if(request()->has('image')){
            if(File::exists(public_path(auth()->user()->image))){
                File::delete(public_path(auth()->user()->image));
            }
            $image_name = 'img_'.time().'.'.request('image')->getclientoriginalextension();
            $image_url = "profile_images/".$role."/";
            request()->file('image')->storeAs($image_url,$image_name);
            $credentials['image'] = "/storage/".$image_url.$image_name;
        }
        
        return auth()->user()->update($credentials);
        
        
    } 
}