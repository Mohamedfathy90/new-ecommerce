<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'banner' => ['required' , 'image' , 'max:2048'] ,
            'type'   => ['required' , 'string'] , 
            'title'  => ['required' , 'string'] , 
            'price'  => ['required','decimal:0,2'] , 
            'url'    => ['required'] ,
            'order'  => ['required' , 'decimal:0'],
        ]);

        $image_name = "img_".time().'.'.$request->banner->getclientoriginalextension();
        $image_url  = "slider_images";
        $request->file('banner')->storeAs($image_url,$image_name); 
        $credentials['banner']  = "/storage/".$image_url.'/'.$image_name ;
        $credentials['status'] = $request->status ;
        Slider::create($credentials);

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
}
