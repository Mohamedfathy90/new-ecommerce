@extends('admin.layouts.master')

@section('title',"Add Product")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add New Product</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/category">All Products</a></div>
              <div class="breadcrumb-item"><a href="/admin/category/create">Add Product</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/product" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" class='form-control' name="thumbnail" >
                        @error('thumbnail')
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
                        <label>Description</label>
                        <textarea class="summernote" name="description">{{old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                         
                    <div class="form-group">
                      <label>Select Brand</label>
                      <select class="form-control" name="brand_id">
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                      </select>
                    </div>

                   
                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Select main-Category</label>
                      <select class="form-control select-category" name="category_id">
                      <option>Select Main-Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    
                    <div class="form-group col-md-4">
                      <label>Select sub-Category</label>
                      <select class="form-control select-subcategory" name="subcategory_id">
                       <option>Select Sub-Category</option>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label>Select Child-Category</label>
                      <select class="form-control select-childcategory" name="childcategory_id">
                      <option>Select Child-Category</option>
                      </select>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label>Quantity</label>
                        <input type="text" class='form-control' name="qty" value="{{old('qty')}}">
                        @error('qty')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Price</label>
                        <input type="text" class='form-control' name="price" value="{{old('price')}}">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    </div>

                    <div class="row">
                    <div class="form-group col-md-4">
                        <label>Offer Price</label>
                        <input type="text" class='form-control' name="offer_price" value="{{old('offer_price')}}">
                        @error('offer_price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>Offer start-date</label>
                        <input type="date" class='form-control' name="offer_start_date" value="{{old('offer_start_date')}}">
                        @error('offer_start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>Offer end-date</label>
                        <input type="date" class='form-control' name="offer_end_date" value="{{old('offer_end_date')}}">
                        @error('offer_end_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="row">
                    <div class="form-group col-md-3">
                      <label>is_top</label>
                      <select class="form-control" name="is_top">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>is_best</label>
                      <select class="form-control" name="is_best">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>is_featured</label>
                      <select class="form-control" name="is_featured">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>

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