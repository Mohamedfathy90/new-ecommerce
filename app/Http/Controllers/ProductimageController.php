<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productimage;
use App\Traits\image;
use Illuminate\Http\Request;

class ProductimageController extends Controller
{
    
    use image ;
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        if(request()->ajax()) {
            return datatables()->of(productimage::where('product_id',$product->id)->get())
            
            ->addColumn('image', function($row){
               return '<img src="'.$row['image'].'" width="200px" height="100px"></$row>' ;
                })

            ->addColumn('action', function($row){
            $actionBtn = '<a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="productimage" data-url="/admin/productimage/'.$row['id'].'"
            data-text="Are You Sure you want to permenantly delete this product image?">Delete</a> ';
            return $actionBtn;
            })
            ->rawColumns(['image','action'])
            ->addIndexColumn()
            ->make(true);
            } 
      return view('admin.productimage.index' , ['product'=>$product]);
    
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
    public function store(Request $request , Product $product)
    {
        $request->validate([
            'image.*'=>['image','max:2048'],
        ]);
        
        foreach($request->image as $image){
            $credentials['image']=$this->saveimage('product_images/'.$product->id,$image);
            $credentials['product_id']=$product->id;
            Productimage::create($credentials);
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Productimage $productimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productimage $productimage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productimage $productimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productimage $productimage)
    {
        $this->deleteimage($productimage->image);
        $productimage->delete();
        return response(['status'=>'success' , 'message'=>"Product Image has been deleted!"]);
    }
}
