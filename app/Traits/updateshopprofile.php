<?php

namespace App\Traits;

use Clockwork\Request\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

trait updateshopprofile {
    
    use image;
    
    public function updateshopprofiledata($request , $vendor_profile){
        $credentials = $request->validate([
            'image'         => ['image' , 'max:2048' , 'nullable'] ,
            'name'          => ['required' , Rule::unique('vendors')->ignore($vendor_profile->id)] ,
            'email'         => ['required' , Rule::unique('vendors')->ignore($vendor_profile->id)] , 
            'address'       => ['required' , 'string'] , 
            'description'   => ['required' , 'string'] , 
            'phone'         => ['required','numeric'] , 
            // 'fb_link'       => ['url','nullable'] ,
            // 'tw_link'       => ['url','nullable'] ,
            // 'inst_link'     => ['url','nullable'] ,
        ]);

        if ($request->has('image')){
            $this->deleteimage($vendor_profile->image);
            $credentials['image']=$this->saveimage('vendor_banners');
        }
       
        return $credentials ;
        
        
    } 
}