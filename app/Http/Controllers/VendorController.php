<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\updatepassword;
use App\Traits\updateprofile;

class VendorController extends Controller
{
    use updateprofile;
    use updatepassword;
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('vendor.dashboard');
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
        return view('vendor.profile');
    }
    
    
    public function shopprofile(){
        $vendor = Vendor::where('user_id',auth()->id())->first();
        return view('vendor.vendorshop' , ['vendor'=>$vendor]);
    }

    public function updateprofile(){
    
        $user = $this->updateprofiledata(Auth::user()->role);
    
        if($user)
        toastr()->success('Profile updated successfully');
        return redirect('/vendor/profile');
        }

    public function updatepassword(){
        $user = $this->updateprofilepassword();
        if($user)
        auth()->Logout();
        toastr()->success('Password updated successfully');
        return redirect('/vendor/login');
        } 

}
