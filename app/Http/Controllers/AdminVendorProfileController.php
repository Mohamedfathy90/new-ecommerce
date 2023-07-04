<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Traits\image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminVendorProfileController extends Controller
{
    use image;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vendor-profile.index',['vendor'=>Vendor::where('user_id',auth()->id())->first()]); 
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
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Vendor $vendor_profile)
    {
        $credentials = $request->validate([
            'image'         => ['image' , 'max:2048'] ,
            'name'          => ['required' , Rule::unique('vendors')->ignore($vendor_profile->id)] ,
            'email'         => ['required' , Rule::unique('vendors')->ignore($vendor_profile->id)] , 
            'address'       => ['required' , 'string'] , 
            'description'   => ['required' , 'string'] , 
            'phone'         => ['required','numeric'] , 
            'fb_link'       => ['url','nullable'] ,
            'tw_link'       => ['url','nullable'] ,
            'inst_link'     => ['url','nullable'] ,
        ]);

        if ($request->has('image')){
            $this->deleteimage($vendor_profile->image);
            $credentials['image']=$this->saveimage('vendor_banners');
        }
        else{
            unset($credentials['image']);
        }
        $vendor_profile->update($credentials);
        return redirect('/admin/vendor-profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
