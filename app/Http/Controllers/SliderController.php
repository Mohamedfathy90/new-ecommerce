<?php

namespace App\Http\Controllers;

use App\DataTables\SlidersDataTable;
use App\Models\Slider;
use App\Traits\image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    use image;
    
    /**
     * Display a listing of the resource.
     */
    public function index(SlidersDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
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
            'image'  => ['required' , 'image' , 'max:2048'] ,
            'type'   => ['required' , 'string'] , 
            'title'  => ['required' , 'string'] , 
            'price'  => ['required','decimal:0,2'] , 
            'url'    => ['required'] ,
            'order'  => ['required' , 'decimal:0'],
        ]);

        $credentials['image']=$this->saveimage('slider_images');
        $credentials['status'] = $request->status ;
        Slider::create($credentials);
        toastr()->success("Slider added successfully");
        return redirect('/admin/slider');

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
        return view('admin.slider.edit',['slider'=>Slider::findorfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Slider = Slider::findorfail($id);
        
        $credentials = $request->validate([
            'image'  => ['image' , 'max:2048'] ,
            'type'   => ['required' , 'string'] , 
            'title'  => ['required' , 'string'] , 
            'price'  => ['required','decimal:0,2'] , 
            'url'    => ['required'] ,
            'order'  => ['required' , 'decimal:0'],
        ]);
        $credentials['status'] = $request->status ;
        
        if($request->has('image')){
            if(File::exists(public_path($Slider->image))){
                File::delete(public_path($Slider->image));
            }
        $credentials['image']=$this->saveimage('slider_images'); 
        }
        $Slider->update($credentials);
        toastr()->success("Slider updated successfully");
        return redirect('/admin/slider');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
