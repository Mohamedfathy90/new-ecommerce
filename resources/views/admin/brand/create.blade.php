@extends('admin.layouts.master')

@section('title',"Add Brand")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add new Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/brand">All Brands</a></div>
              <div class="breadcrumb-item"><a href="/admin/brand/create">Add Brand</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/brand" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>logo</label>
                        <input type="file" class='form-control' name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                         
                    <div class="form-group">
                      <label>Is-Featured</label>
                      <select class="form-control" name="is_featured">
                        <option></option>
                        <option value=1>Yes</option>
                        <option value=0 selected>No</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create</button>
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