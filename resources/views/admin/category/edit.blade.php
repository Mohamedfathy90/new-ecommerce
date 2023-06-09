@extends('admin.layouts.master')

@section('title',"Edit category")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Main Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/category">Main Categories</a></div>
              <div class="breadcrumb-item"><a href="">Edit Category</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/category/{{$category->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    
                    <div class="form-group">  
                    <div role="iconpicker" name="icon" data-align="left" data-label-header="Select Icon" data-rows="3" data-cols="6"
                     data-icon="{{$category->icon}}"> </div>
                    @error('icon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$category->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                         {{$category->status==="active"? "selected" :""}}> Active </option>
                        <option value="inactive" 
                         {{$category->status==="inactive"? "selected" :""}} > Inactive </option>
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