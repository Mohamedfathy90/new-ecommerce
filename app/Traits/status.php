<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait status {


public function changestatus ($variable){
    
    if($variable->status == 'active'){
        $variable->update(['status' => 'inactive']);
        return response(['status'=>'success' , 'message'=>"Status has been updated!"]);
     }
     if($variable->status =='inactive'){
        $variable->update(['status' => 'active']);
        return response(['status'=>'success' , 'message'=>"Status has been updated!"]);

}


}

}