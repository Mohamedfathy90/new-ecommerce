<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Traits\updatepassword;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\updateprofile;

use function PHPUnit\Framework\fileExists;

class AdminController extends Controller
{
   
   use updateprofile;
   use updatepassword;
   
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.dashboard');
    }

   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile(){
        return view('admin.profile');
    }

    
    public function updateprofile(){
    
    $user = $this->updateprofiledata(Auth::user()->role);

    if($user)
    toastr()->success('Profile updated successfully');
    return redirect('/admin/profile');
    }
    
    
   
    public function updatepassword(){
        $user = $this->updateprofilepassword();
        if($user)
        auth()->Logout();
        toastr()->success('Password updated successfully');
        return redirect('/admin/login');
        } 
    

}

