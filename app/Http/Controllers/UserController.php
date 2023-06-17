<?php

namespace App\Http\Controllers;

use App\Traits\updatepassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\updateprofile;


use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{
    
    use updateprofile;
    use updatepassword;
    
    public function edit()
    {
        return view('front.profile');
    }
    
    public function updateprofile() {     
    $user = $this->updateprofiledata(Auth::user()->role);
    if($user)
    toastr()->success('Profile updated successfully');
    return redirect('/user/profile');
    }

    public function updatepassword(){
        $user = $this->updateprofilepassword();
        if($user)
        auth()->Logout();
        toastr()->success('Password updated successfully');
        return redirect('/user/login');
        } 
    }
