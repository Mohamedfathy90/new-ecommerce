<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        return view('front.profile');
    }
    
    public function updateprofile() {
        
        $credentials= request()->validate([
            'name'       =>['required','min:4'],
            'username'   =>['required','min:4','unique:users,username,'.Auth::id()],
            'email'      =>['email','required','unique:users,email,'.Auth::id()]
        ]);    
        $credentials['phone']=request('phone');
     
        if(request()->has('image')){
            if(auth()->user()->image!==null && fileExists(public_path(auth()->user()->image))){
                unlink(public_path(auth()->user()->image));
            }
            $image_name = 'img_'.time().'.'.request('image')->getclientoriginalextension();
            $image_url = "profile_images/user/";
            request()->file('image')->storeAs($image_url,$image_name);
            $credentials['image'] = "/storage/".$image_url.$image_name;
        }
        
        auth()->user()->update($credentials);
        toastr()->success('Profile updated successfully');
        return redirect('/user/profile');
    
    }
}
