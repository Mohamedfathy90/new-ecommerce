@extends('admin.layouts.master')

@section('title',"Create Product Variant")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create Product Variant</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product">All Products</a></div>
              <div class="breadcrumb-item"><a href="/admin/productvariant/{{$product->id}}">Product Variants</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/productvariant/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                        <label>Name</label>
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