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
            return datatables()->of(Category::select('*'))
            
            ->addColumn('icon', function($row){
               return '<i style="font-size:25px;" class="'.$row['icon'].'" aria-hidden="true"></i>' ;
               
                })
            
            ->addColumn('action', function($row){
            $actionBtn = '<a href= "/admin/category/'.$row['id'].'/edit"   class="edit btn btn-success">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger show_confirm" data-url="/admin/category/'.$row['id'].'">Delete</a>';
            return $actionBtn;
            })
            
            ->addColumn('status', function($row){
                if($row['status']==='active')
                return '<span class="badge badge-success">Active</span>';
                if($row['status']==='inactive')
                return '<span class="badge badge-danger">Inactive</span>';
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
            'icon'   => ['required','string'] ,
            'name'   => ['required' , 'string'] , 
        ]);
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
}
