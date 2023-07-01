<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Vendor;
use App\Traits\image;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use image ;


    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(product::all())
            
            ->addColumn('vendor_id', function($row){
               return Vendor::findorfail($row['vendor_id'])->user->name ;
                })
            ->addColumn('brand_id', function($row){
               return Brand::findorfail($row['brand_id'])->name ;
                })
            ->addColumn('category_id', function($row){
               return Category::findorfail($row['category_id'])->name ;
                })
            ->addColumn('thumbnail', function($row){
               return '<img src="'.$row['thumbnail'].'" width="200px" height="100px"></$row>' ;
                })
            
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/product/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="category" data-url="/admin/product/'.$row['id'].'"
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
        return view('admin.product.create',['brands'=>Brand::all(),'categories'=>Category::where('status','active')->get()]);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credntials = $request->validate([
            'thumbnail'        => ['required', 'image' , 'max:2048'] ,
            'name'             => ['required', 'string' , 'unique:products,name'] ,
            'description'      => ['required', 'string'] ,
            'brand_id'         => ['required','numeric'],
            'category_id'      => ['required','numeric'],
            'subcategory_id'   => ['required','numeric'],
            'childcategory_id' => ['required','numeric'],
            'qty'              => ['required','integer','numeric','min:0'],
            'price'            => ['required','numeric','min:0'],
            'offer_price'      => ['numeric','nullable'],
            'type'             => ['required'],
            'status'           => ['required'],
        ] , 
    ['brand_id'=>"please select product brand",'category_id'=>"please select product category",
    'subcategory_id'=>"please select product sub-category",'childcategory_id'=>"please select product child-category"]
        );
        $credntials['thumbnail'] = $this->saveimage('product_thumbnails');
        $credntials['vendor_id'] = Vendor::where('user_id',auth()->id())->first()->id;
        Product::create($credntials);
        Toastr()->success('Product has been added successfully');
        return redirect('/admin/product');
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
        return view('admin.product.edit',['product'=>$product,'brands'=>Brand::all(),
        'categories'       =>Category::where('status','active')->get(), 
        'subcategories'    =>Subcategory::where('category_id',$product->category_id)->get(),  
        'childcategories'  =>Childcategory::where('subcategory_id',$product->subcategory_id)->get(),  
    ]);
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
