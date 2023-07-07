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
use App\Traits\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Yoeunes\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use image ;
    use status;

    public function index()
    {
        $route = Route::current()->getName();
       
        
        if($route ===  "product.index")
        {
            $products=product::where('vendor_id',auth()->user()->vendor->id)->get();
        }
        else
        {
            $products=product::where('vendor_id','!=',auth()->user()->vendor->id)->get();
        }
        
        if(request()->ajax()) {
                        
            return datatables()->of($products)
            
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
            ->addColumn('type', function($row){
                return '<span class="badge badge-warning">'.$row['type'].'</span> ';
                    })

            
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/product/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="product" data-url="/admin/product/'.$row['id'].'"
            data-text="Are You Sure you want to permenantly delete this product?">Delete</a> 
            <div class="dropdown d-inline show">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu">
            <a class="dropdown-item has-icon" href="/admin/productimage/'.$row['id'].'"><i class="far fa-heart"></i> Images Gallery</a>
            <a class="dropdown-item has-icon" href="/admin/productvariant/'.$row['id'].'"><i class="far fa-file"></i> Product Variants</a>
            </div>
            </div>
            ';
            return $actionBtn;
            })
            
            ->addColumn('status', function($row){
                if($row['status']==='active'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                 data-table="product" data-url="/admin/update_product_status/'.$row['id'].'" checked="">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Active</span>
                </label>';
                }
            
                if($row['status']==='inactive'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="product" data-url="/admin/update_product_status/'.$row['id'].'">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Inactive</span>  
                </label>';
                }
                
            })
            ->rawColumns(['thumbnail','action','type','status'])
            ->addIndexColumn()
            ->make(true);
            } 
      
            if(auth()->user()->role=='admin'){
                if($route ===  "product.index")
                return view('admin.product.index');
                if($route ===  "sellers-products")
                return view('admin.product.seller_products');
             }
        
             elseif(auth()->user()->role=='vendor')
                 return view('vendor.product.index');
  
    
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
        $credentials = $request->validate([
            'thumbnail'        => ['required', 'image' , 'max:2048'] ,
            'name'             => ['required', 'string' , 'unique:products,name'] ,
            'description'      => ['required', 'string'] ,
            'brand_id'         => ['required'],
            'category_id'      => ['required'],
            'subcategory_id'   => ['required'],
            'childcategory_id' => ['required'],
            'qty'              => ['required','integer','numeric','min:0'],
            'price'            => ['required','numeric','min:0'],
            'offer_price'      => ['numeric','nullable'],
            'type'             => ['required'],
            'status'           => ['required'],
        ] , 
    ['brand_id'=>"please select product brand",'category_id'=>"please select product category",
    'subcategory_id'=>"please select product sub-category",'childcategory_id'=>"please select product child-category"]
        );
        $credentials['thumbnail'] = $this->saveimage('product_thumbnails');
        $credentials['vendor_id'] = Vendor::where('user_id',auth()->id())->first()->id;
        Product::create($credentials);
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
        $credentials = $request->validate([
            'thumbnail'        => ['image' , 'max:2048'] ,
            'name'             => ['required', 'string' , Rule::unique('products','name')->ignore($product)] ,
            'description'      => ['required', 'string'] ,
            'brand_id'         => ['required'],
            'category_id'      => ['required'],
            'subcategory_id'   => ['required'],
            'childcategory_id' => ['required'],
            'qty'              => ['required','integer','numeric','min:0'],
            'price'            => ['required','numeric','min:0'],
            'offer_price'      => ['numeric','nullable'],
            'type'             => ['required'],
            'status'           => ['required'],
        ] , 
        ['brand_id'=>"please select product brand",'category_id'=>"please select product category",
        'subcategory_id'=>"please select product sub-category",'childcategory_id'=>"please select product child-category"]
        );
        
        if($request->has('thumbnail')){
            $this->deleteimage($product->thumbnail);
            $credentials['thumbnail'] = $this->saveimage('product_thumbnails');
        }
        
        $product->update($credentials);
        Toastr()->success('Product has been updated successfully');
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
      $this->deleteimage($product->thumbnail);
      File::deleteDirectory(public_path('/storage/product_images/'.$product->id)); 
      $product->delete();
       return response(['status'=>'success' , 'message'=>"Product has been deleted!"]);
    }

    public function updatestatus(Product $product){
        
        $this->changestatus($product);
        
    }
    
}

