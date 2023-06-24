<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Category::all())
            
            ->addColumn('icon', function($row){
               return '<i style="font-size:25px;" class="'.$row['icon'].'" aria-hidden="true"></i>' ;
               
                })
            
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/category/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" 
            class="delete btn btn-danger show_confirm" data-table="category" data-url="/admin/category/'.$row['id'].'">Delete</a>';
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
            ->rawColumns(['icon','action','status'])
            ->addIndexColumn()
            ->make(true);
            } 
      return view('admin.category.index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'icon'   => ['required' , 'string'] ,
            'name'   => ['required' , 'string' , 'unique:categories,name'] , 
        ]);

        $credentials['status'] = $request->status ;
        Category::create($credentials);
        toastr()->success("Category added successfully");
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.category.edit',['category'=>Category::findorfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findorfail($id);
        
        $credentials = $request->validate([
            'name'   => ['required' , 'string']  
        ]);
        $credentials['icon'] = $request->icon ?: $category->icon ;
        $credentials['status'] = $request->status ;
      
        $category->update($credentials);
        toastr()->success("Category updated successfully");
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return response(['status'=>'success' , 'message'=>"Category has been deleted!"]);
    }

    public function updatestatus(Category $category){
        
        if($category->status == 'active'){
           $category->update(['status' => 'inactive']);
           return response(['status'=>'success' , 'message'=>"Status has been updated!"]);
        }
        if($category->status =='inactive'){
           $category->update(['status' => 'active']);
           return response(['status'=>'success' , 'message'=>"Status has been updated!"]);
        }
        
    }
}
