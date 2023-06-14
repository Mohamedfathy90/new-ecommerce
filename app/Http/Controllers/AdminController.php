<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
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
    $credentials= request()->validate([
        'name'   =>['required','min:4'],
        'email'  =>['email','required','unique:users,email,'.Auth::id()]
    ]);    
    $credentials['phone']=request('phone');

    if(request()->has('image')){
        $image_name = 'img_'.time().'.'.request('image')->getclientoriginalextension();
        $image_url = "/profile_images/admin/";
        $credentials['image'] = "/storage/".$image_url.$image_name;
        request()->file('image')->storeAs($image_url,$image_name);
        auth()->user()->update($credentials);
    }
}
    
    public function updatepassword(){
    $credentials = request()->validate([
        'current_password' => ['required','current_password'] ,
        'password' => ['required','confirmed']
    ]);
    auth()->user()->update([
        'password' => Hash::make($credentials['password']) 
    ]);
    auth()->Logout();
    return redirect('/admin/login');
} 

}

