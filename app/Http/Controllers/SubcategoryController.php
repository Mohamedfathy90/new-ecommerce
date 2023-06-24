<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            
            $subcategory = Subcategory::with('category')->orderBy('category_id')->get();
            return datatables()->of($subcategory)
            
            ->addColumn('category', function(Subcategory $subcategory){

                return $subcategory->category->name;
                
            })
         
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/subcategory/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="subcategory" data-url="/admin/subcategory/'.$row['id'].'">Delete</a>';
            return $actionBtn;
            })
            
            ->addColumn('status', function($row){
                if($row['status']==='active'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="subcategory" data-url="/admin/update_subcategory_status/'.$row['id'].'" checked="">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Active</span>
                </label>';
                }
            
                if($row['status']==='inactive'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="subcategory" data-url="/admin/update_subcategory_status/'.$row['id'].'">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Inactive</span>
                </label>';
                }
                
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
            } 
      return view('admin.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subcategory.create' , ['categories'=>Category::where('status','active')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'category_id'   => ['required'] , 
            'name'          => ['required' , 'string' , 'unique:subcategories,name'] , 
        ],['category_id' => "please select main category"]);

        $credentials['status']      = $request->status ;
        Subcategory::create($credentials);
        toastr()->success("Category added successfully");
        return redirect('/admin/subcategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategory.edit',['subcategory'=>$subcategory ,'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $credentials = $request->validate([
            'name'   => ['required' , 'string' , Rule::unique('subcategories')->ignore($subcategory->id),] , 
        ]);

        $credentials['status']      = $request->status ;
        $credentials['category_id'] = $request->category_id ;
        $subcategory->update($credentials);
        toastr()->success("Category updated successfully");
        return redirect('/admin/subcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        Subcategory::destroy($subcategory->id);
        return response(['status'=>'success' , 'message'=>"Category has been deleted!"]);
    }

    public function updatestatus(SubCategory $subcategory){
        
        if($subcategory->status == 'active'){
           $subcategory->update(['status' => 'inactive']);
           return response(['status'=>'success' , 'message'=>"Status has been updated!"]);
        }
        if($subcategory->status =='inactive'){
           $subcategory->update(['status' => 'active']);
           return response(['status'=>'success' , 'message'=>"Status has been updated!"]);
        }
        
    }

    public function getsubcategories(Category $category){
        return Subcategory::where(['status'=>'active','category_id'=>$category->id])->get();
    }
}
