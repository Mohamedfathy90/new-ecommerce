@extends('admin.layouts.master')

@section('title',"Add Child-Category")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Child-Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/childcategory">All Child-Categories</a></div>
              <div class="breadcrumb-item"><a href="/admin/childcategory/create">Add child-Category</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/childcategory" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                      <label>Main Category</label>
                      <select class="form-control select-category" data-url="/admin/getsubcategory/" name="category_id">
                         <option selected value="">Select main Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
              
                    <div class="form-group">
                      <label>Sub Category</label>
                      <select class="form-control select-subcategory"  name="subcategory_id">
                      </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Child-Category Name</label>
                        <input type="text" class='form-control' name="name" value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                         
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>
                  </div>
                  <div class="card-footer text-right">
                    
                  </div>
                </div>
              </div>
              </div>
            </div>
           
          </div>
    </section>
</div>



@endsection