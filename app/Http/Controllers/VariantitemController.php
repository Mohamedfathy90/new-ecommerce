<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productvariant;
use App\Models\Variantitem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VariantitemController extends Controller
{
    public function index(Productvariant $productvariant){

        if(request()->ajax()) {
            
            return datatables()->of(Variantitem::where('productvariant_id',$productvariant->id)->get())

            ->addColumn('productvariant_id', function($row){
                return Productvariant::findorfail($row['productvariant_id'])->name;
                })

            ->addColumn('action', function($row){
                $actionBtn = '<a href= "/admin/variantitem/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
                class="delete btn btn-danger show_confirm" data-table="variantitem" data-url="/admin/variantitem/'.$row['id'].'"
                data-text="Are You Sure you want to permenantly delete this variant item?">Delete</a>';
                return $actionBtn;
                })

            ->addColumn('status', function($row){
                if($row['status']==='active'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="variantitem" data-url="/admin/update_variantitem_status/'.$row['id'].'" checked="">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Active</span>
                </label>';
                }
            
                if($row['status']==='inactive'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="variantitem" data-url="/admin/update_variantitem_status/'.$row['id'].'">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Inactive</span>  
                </label>';
                }
                
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
            } 
    
            $product = Product::findorfail($productvariant->product_id);
            return view('admin.variantitem.index',['productvariant'=>$productvariant , 'product'=>$product]);
    
}

        public function create(Productvariant $productvariant){

            return view('admin.variantitem.create',['productvariant'=>$productvariant]);

        }

        public function store(Request $request , Productvariant $productvariant){

            $credentials = $request->validate([
                'name'  => ['required','string','unique:variantitems,name'],
                'price' => ['required','numeric','min:0'],
                'qty'   => ['required','numeric','integer','min:0'],
            ]);
            $credentials['status']    =$request->status ;
            $credentials['productvariant_id']    =$productvariant->id ;
            Variantitem::create($credentials);
            Toastr()->success("Variant Item added successfully");
            return redirect('/admin/variantitem/'.$productvariant->id);
        
        }

        public function edit(Variantitem $variantitem){
            $productvariant = Productvariant::findorfail($variantitem->productvariant_id);
            return view('admin.variantitem.edit',['variantitem'=>$variantitem , 'productvariant'=>$productvariant]);
        }

        
        public function update(Request $request , Variantitem $variantitem){
            $credentials = $request->validate([
                'name'  => ['required','string', Rule::unique('variantitems','name')->ignore($variantitem)],
                'price' => ['required','numeric','min:0'],
                'qty'   => ['required','numeric','integer','min:0'],
            ]);
            $credentials['status']    =$request->status ;
            $variantitem->update($credentials);
            Toastr()->success("Variant Item updated successfully");
            return redirect('/admin/variantitem/'.$variantitem->productvariant_id);
        
        }

        public function destroy(Variantitem $variantitem){
            Variantitem::destroy($variantitem->id);
            return response(['message'=>"Variant Item has been deleted successfully"]);
        }

        public function updatestatus(Variantitem $variantitem){
                $this->changestatus($variantitem);
            }


}
