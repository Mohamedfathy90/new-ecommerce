<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(product::all())
            
            ->addColumn('thumbnail', function($row){
               return '<img src="'.$row['thumbnail'].'" width="200px"></img>' ;
                })
            
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/category/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="category" data-url="/admin/category/'.$row['id'].'"
            data-text="Are You Sure you want to permenantly delete this category with all its subcategories?">Delete</a>';
            return $actionBtn;
            })
            
            ->addColumn('status', function($row){
                if($row['status']==='active'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                 data-table="category" data-url="/admin/update_category_status/'.$row['id'].'" checked="">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Active</span>
                </label>';
                }
            
                if($row['status']==='inactive'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="category" data-url="/admin/update_category_status/'.$row['id'].'">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Inactive</span>  
                </label>';
                }
                
            })
            ->rawColumns(['thumbnail','action','status'])
            ->addIndexColumn()
            ->make(true);
            } 
      return view('admin.product.index');
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create',['brands'=>Brand::all(),'categories'=>Category::all(),'subcategories'=>Subcategory::all(),'childcategories'=>ChildCategory::all()]);
    
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
