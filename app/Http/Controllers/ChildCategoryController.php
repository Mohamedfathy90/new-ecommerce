<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            
            $childcategory = ChildCategory::with(['subcategory','category'])->whereHas('category', function (Builder $query) {
                $query->where('status', 'active');
                })->orderby('category_id')->get();
            
            return datatables()->of($childcategory)
            
            ->addColumn('subcategory', function(ChildCategory $childcategory){

                return $childcategory->subcategory->name;
                
            })

            ->addColumn('category', function(ChildCategory $childcategory){

                return $childcategory->subcategory->category->name;
                
            })
         
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/childcategory/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="childcategory" data-url="/admin/childcategory/'.$row['id'].'"
            data-text="Are You Sure you want to permenantly delete this childcategory ?">Delete</a>';
            return $actionBtn;
            })
            
            ->addColumn('status', function($row){
                if($row['status']==='active'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="childcategory" data-url="/admin/update_childcategory_status/'.$row['id'].'" checked="">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Active</span>
                
                </label>';
                }
            
                if($row['status']==='inactive'){
                return '<label class="custom-switch">
                <input type="radio" value="1" class="custom-switch-input change-status" 
                data-table="childcategory" data-url="/admin/update_childcategory_status/'.$row['id'].'">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Inactive</span>
                
                </label>';
                }
                
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
            } 
      return view('admin.childcategory.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.childcategory.create' , ['categories'=>Category::where('status','active')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'category_id'      => ['required'] , 
            'subcategory_id'   => ['required'] , 
            'name'          => ['required' , 'string' , 'unique:childcategories,name'] , 
        ],['category_id' => "please select main category"]);

        $credentials['status']      = $request->status ;
        ChildCategory::create($credentials);
        toastr()->success("Child Category added successfully");
        return redirect('/admin/childcategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChildCategory $childCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChildCategory $childcategory)
    {
        return view('admin.childcategory.edit' , ['childcategory'=>$childcategory->load('subcategory') , 
        'categories'=>Category::with(['subcategory'])->where('status','active')->get() , 
        'subcategories'=>Subcategory::where('category_id',$childcategory->category_id)->get()
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChildCategory $childcategory)
    {
        $credentials = $request->validate([
            'name'   => ['required' , 'string' , Rule::unique('childcategories')->ignore($childcategory->id)] , 
        ]);

        $credentials['status']         = $request->status ;
        $credentials['category_id']    = $request->category_id ;
        $credentials['subcategory_id'] = $request->subcategory_id ;
        $childcategory->update($credentials);
        toastr()->success("Category updated successfully");
        return redirect('/admin/childcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChildCategory $childcategory)
    {
        ChildCategory::destroy($childcategory->id);
        return response(['status'=>'success' , 'message'=>"Child Category has been deleted!"]);
    }

    public function updatestatus(ChildCategory $childcategory){
        
        if($childcategory->status == 'active'){
           $childcategory->update(['status' => 'inactive']);
           return response(['status'=>'success' , 'message'=>"Status has been updated!"]);
        }
        if($childcategory->status =='inactive'){
           $childcategory->update(['status' => 'active']);
           return response(['status'=>'success' , 'message'=>"Status has been updated!"]);
        }
        
    }

    public function getchildcategories(Subcategory $subcategory){
        return ChildCategory::where(['status'=>'active','subcategory_id'=>$subcategory->id])->get();
    }


}
