@extends('admin.layouts.master')

@section('title',"Edit Brand")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/brand">All Brands</a></div>
              <div class="breadcrumb-item"><a href="">Edit Category</a></div>
            </div>
          </div> 
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/brand/{{$brand->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
              
                    <div class="form-group">
                        <label>Preview</label>
                        <img src="{{$brand->image}}" width="200">
                    </div>
           
                    <div class="form-group">
                        <label>logo</label>
                        <input type="file" class='form-control' name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$brand->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Is-Featured</label>
                      <select class="form-control" name="is_featured">
                      <option value=1 
                        {{$brand->is_featured===1? "selected" :""}}> Yes </option>
                        <option value=0
                        {{$brand->is_featured===0? "selected" :""}}> No </option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                        {{$brand->status==="active"? "selected" :""}}> Active </option>
                        <option value="inactive" 
                        {{$brand->status==="inactive"? "selected" :""}}> Inactive </option>
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