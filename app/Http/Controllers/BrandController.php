<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Traits\image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    
    use image;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Brand::all())
            
            ->addColumn('image', function($row){
                return  '<img src="'.$row['image'].'" width="100px">';
                })
            
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/brand/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="brand" data-url="/admin/brand/'.$row['id'].'"  
            data-text="Are You Sure you want to permenantly delete this brand ?">Delete</a>';
            return $actionBtn;
            })
            
            ->addColumn('is_featured', function($row){
                if($row['is_featured']===1)
                return '<span class="badge badge-success">Yes</span>';
                if($row['is_featured']===0)
                return '<span class="badge badge-danger">No</span>';
                })
            
            ->addColumn('status', function($row){
                if($row['status']==='active'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                 data-table="brand" data-url="/admin/update_brand_status/'.$row['id'].'" checked="">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Active</span>
                </label>';
                }
            
                if($row['status']==='inactive'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="brand" data-url="/admin/update_brand_status/'.$row['id'].'">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Inactive</span>  
                </label>';
                }
                
            })
            ->rawColumns(['image','action','status','is_featured'])
            ->addIndexColumn()
            ->make(true);
            } 
      return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'image'   => ['required' , 'image' , "max:2048"] ,
            'name'   => ['required' , 'string' , 'unique:brands,name'] , 
        ]);
        $credentials['image']= $this->saveimage('brands_logo');
        $credentials['status'] = $request->status ;
        $credentials['is_featured'] = $request->is_featured ;
        Brand::create($credentials);
        toastr()->success("Brand added successfully");
        return redirect('/admin/brand');
      }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {    
        $credentials = $request->validate([
            'name'   => ['required' , 'string' , Rule::unique('brands')->ignore($brand->id)] , 
            'image'  => ['image','max:2048'] ,
        ]);
        $credentials['status'] = $request->status ;
        $credentials['is_featured'] = $request->is_featured ;
        
        if($request->has('image')){
        $this->deleteimage($brand->image);
        $credentials['image']=$this->saveimage('brands_logo'); 
        }
        $brand->update($credentials);
        toastr()->success("Brand updated successfully");
        return redirect('/admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::destroy($brand->id);
        return response(['status'=>'success' , 'message'=>"Brand has been deleted!"]);

    }
    
    public function updatestatus(Brand $brand){
        
        $this->changestatus($brand);
        
    }
}
