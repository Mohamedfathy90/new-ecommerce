@extends('admin.layouts.master')

@section('title',"Edit Product Variant Item")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Product Variant Item</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product">All Products</a></div>
              <div class="breadcrumb-item"><a href="/admin/productvariant/{{$productvariant->product_id}}">Product Variants</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/variantitem/{{$variantitem->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$variantitem->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class='form-control' name="qty" value="{{$variantitem->qty}}">
                        @error('qty')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                        <label>Price</label>
                        <input type="text" class='form-control' name="price" value="{{$variantitem->price}}">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                         
                      <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                         {{$variantitem->status==="active"? "selected" :""}}> Active </option>
                        <option value="inactive" 
                         {{$variantitem->status==="inactive"? "selected" :""}} > Inactive </option>
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