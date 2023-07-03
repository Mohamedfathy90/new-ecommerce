<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait image {


public function saveimage ($url,$image=null){

if(request()->has('image')){
    
    if(gettype(request('image'))=='array'){
        $image_name = 'img_'.hexdec(uniqid()).'.'.$image->getclientoriginalextension();
        $image->storeAs($url,$image_name);
    }
    else{
        $image_name = 'img_'.time().'.'.request('image')->getclientoriginalextension();
        request()->file('image')->storeAs($url,$image_name);
    }

}
elseif(request()->has('thumbnail')){
$image_name = 'img_'.time().'.'.request('thumbnail')->getclientoriginalextension();
request()->file('thumbnail')->storeAs($url,$image_name);
}
return ("/storage/".$url.'/'.$image_name);
}

public function deleteimage($image){
    if(File::exists(public_path($image))){
        File::delete(public_path($image));
    }
}

}