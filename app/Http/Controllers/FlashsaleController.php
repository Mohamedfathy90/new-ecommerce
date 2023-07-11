<?php

namespace App\Http\Controllers;

use App\Models\Flashsale;
use App\Models\Flashsale_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class FlashsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
                        
            return datatables()->of(Flashsale_item::all())
            
            ->addColumn('product_id', function($row){
               $product=Product::findorfail($row['product_id']);
               return '<a href="/admin/product/'.$row['product_id'].'/edit">'.$product->name.'</a>' ;
            })
       
            ->addColumn('action', function($row){
            $actionBtn = '<a href="javascript:void(0)" class="delete btn btn-danger show_confirm" data-table="flashsale_items"
            data-url="/admin/flashsale/'.$row['id'].'"
            data-text="Are You Sure you want to permenantly delete this product?">Delete</a> ';
            return $actionBtn;
            })
            
   
            ->rawColumns(['product_id','action'])
            ->addIndexColumn()
            ->make(true);
            } 
        
        return view('admin.flashsale.index',['products'=>Product::where([
            ['status','active'] , ['is_approved','yes']
        ])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'end_date' => ['required','date']
        ]);
        Flashsale::updateOrCreate(
            ['id'=> 1],
            ['end_date'=>$request->end_date]
        );
        Toastr()->success('Flash Sale added successfully');
        return redirect('/admin/flashsale');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flashsale $flashsale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flashsale $flashsale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flashsale $flashsale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flashsale_item $flashsale)
    {
       $flashsale->delete();
        return response(['status'=>'success' , 'message'=>"Product has been deleted!"]);
    }

    public function additem(Request $request){
        $product= $request->validate([
            'product_id'=>['required','unique:flashsale_items,product_id']
        ]);
        Flashsale_item::create($product);
        Toastr()->success('Flash Sale added successfully');
        return redirect('/admin/flashsale');
    }
}
