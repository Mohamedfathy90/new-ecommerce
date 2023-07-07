<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Traits\image;
use App\Traits\updateshopprofile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminVendorProfileController extends Controller
{
    use image;
    use updateshopprofile;
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
    public function update(Request $request ,  Vendor $vendor_profile)
    {
        $credentials = $this->updateshopprofiledata($request,   $vendor_profile);
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
