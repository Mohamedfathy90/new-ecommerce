@extends('admin.layouts.master')

@section('title',"Edit Sub-Category")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Sub-Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/subcategory">Sub-Categories</a></div>
              <div class="breadcrumb-item"><a href="">Edit Sub-Category</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/subcategory/{{$subcategory->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    
                    <div class="form-group">
                      <label>Main Category</label>
                      <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" 
                        {{($subcategory->category_id==$category->id) ? "selected" : ""}}>
                        {{$category->name}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                   
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$subcategory->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                        {{$subcategory->status==="active"? "selected" :""}} > Active </option>
                        <option value="inactive" 
                        {{$subcategory->status==="inactive"? "selected" :""}} > Inactive </option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
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