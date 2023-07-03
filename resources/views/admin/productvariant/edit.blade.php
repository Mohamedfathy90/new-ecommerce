@extends('admin.layouts.master')

@section('title',"Edit Product Variant")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Product Variant</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product">All Products</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/productvariant/{{$productvariant->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$productvariant->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                         {{$productvariant->status==="active"? "selected" :""}}> Active </option>
                        <option value="inactive" 
                         {{$productvariant->status==="inactive"? "selected" :""}} > Inactive </option>
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