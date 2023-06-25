<?php

namespace App\Http\Controllers;

use App\Models\AdminVendorProfile;
use Illuminate\Http\Request;

class AdminVendorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vendor-profile.index');
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
        $credentials = $request->validate([
            'image'         => ['required' , 'image' , 'max:2048'] ,
            'name'          => ['required' , 'string','unique:admin_vendor_profiles,name'] , 
            'email'         => ['required' , 'email','unique:admin_vendor_profiles,email'] , 
            'address'       => ['required' , 'string'] , 
            'description'   => ['required' , 'string'] , 
            'phone'         => ['required','numeric'] , 
            'fb-link'       => ['url'] ,
            'tw-link'       => ['url'] ,
            'inst-link'     => ['url'] ,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminVendorProfile $adminVendorProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminVendorProfile $adminVendorProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminVendorProfile $adminVendorProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminVendorProfile $adminVendorProfile)
    {
        //
    }
}
