<?php

namespace App\Traits;

trait image {


public function saveimage ($url){

$image_name = 'img_'.time().'.'.request('image')->getclientoriginalextension();
request()->file('image')->storeAs($url,$image_name);
return ("/storage/".$url.'/'.$image_name);

}

}