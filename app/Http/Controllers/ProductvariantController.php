<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productvariant;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yoeunes\Toastr\Facades\Toastr;
use Yoeunes\Toastr\Toastr as ToastrToastr;

class ProductvariantController extends Controller
{
    public function index(Product $product){

        if(request()->ajax()) {
            
            return datatables()->of(Productvariant::where('product_id',$product->id)->get())

            ->addColumn('action', function($row){
                $actionBtn = '<a href="/admin/variantitem/'.$row['id'].'" class="btn btn-primary">View Variant Items</a>
                <a href= "/admin/productvariant/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
                class="delete btn btn-danger show_confirm" data-table="productvariant" data-url="/admin/productvariant/'.$row['id'].'"
                data-text="Are You Sure you want to permenantly delete this product variant with all of its items?">Delete</a>
                
                '
                ;
                return $actionBtn;
                })

            ->addColumn('status', function($row){
                if($row['status']==='active'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="productvariant" data-url="/admin/update_productvariant_status/'.$row['id'].'" checked="">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Active</span>
                </label>';
                }
            
                if($row['status']==='inactive'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="productvariant" data-url="/admin/update_productvariant_status/'.$row['id'].'">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Inactive</span>  
                </label>';
                }
                
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
            } 
    
            return view('admin.productvariant.index',['product'=>$product]);
    
}

public function create(Product $product){

    return view('admin.productvariant.create',['product'=>$product]);

}

public function store(Request $request , Product $product){

    $credentials = $request->validate([
        'name' => ['required','string','unique:productvariants,name']
    ]);

    $credentials['status']    =$request->status ;
    $credentials['product_id']=$product->id ;
    Productvariant::create($credentials);
    Toastr()->success("Product Variant added suucssfully");
    return redirect('/admin/productvariant/'.$product->id);

}

public function edit(Productvariant $productvariant){

    return view('admin.productvariant.edit',['productvariant'=>$productvariant]);

}

public function update (Request $request , Productvariant $productvariant){

    $credentials = $request->validate([
        'name' => ['required','string',Rule::unique('productvariants','name')->ignore($productvariant)]
    ]);
    $credentials['status']    =$request->status ;
    $productvariant->update($credentials);
    Toastr()->success("Product Variant updated successfully");
    return redirect('admin/productvariant/'.$productvariant->product_id);

}


public function destroy(Productvariant $productvariant){
    Productvariant::destroy($productvariant->id);
    return response(['message'=>"Product Variant has been deleted successfully"]);
}

public function updatestatus(Productvariant $productvariant){
        
    $this->changestatus($productvariant);
}










}