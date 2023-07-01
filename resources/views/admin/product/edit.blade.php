@extends('admin.layouts.master')

@section('title',"Edit Product")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Product</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product">All Products</a></div>
              <div class="breadcrumb-item"><a href="">Edit Product</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('patch')    
                    <div class="form-group">
                        <label>Preview</label>
                        <img src="{{$product->thumbnail}}" width="200">
                    </div>
                
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" class='form-control' name="thumbnail" >
                        @error('thumbnail')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$product->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="summernote" name="description">{{$product->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                         
                    <div class="form-group">
                      <label>Select Brand</label>
                      <select class="form-control" name="brand_id">
                      <option>Select Brand</option>
                        @foreach($brands as $brand)
                        <option {{$product->brand_id==$brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                      </select>
                      @error('brand_id')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Select main-Category</label>
                      <select class="form-control select-category" name="category_id">
                      <option>Select Main-Category</option>
                        @foreach($categories as $category)
                        <option {{$product->category_id==$category->id ? 'selected' : ''}} 
                          value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <div class="form-group col-md-4">
                      <label>Select Sub-Category</label>
                      <select class="form-control select-subcategory" name="subcategory_id">
                       @foreach($subcategories as $subcategory)
                        <option {{$product->subcategory_id==$subcategory->id ? 'selected' : ''}} 
                          value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach
                      </select>
                      @error('subcategory_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                      <label>Select Child-Category</label>
                      <select class="form-control select-childcategory" name="childcategory_id">
                      @foreach($childcategories as $childcategory)
                        <option {{$product->childcategory_id==$childcategory->id ? 'selected' : ''}} 
                          value="{{$childcategory->id}}">{{$childcategory->name}}</option>
                        @endforeach
                      </select>
                      @error('childcategory_id')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label>Quantity</label>
                        <input type="text" class='form-control' name="qty" value="{{$product->qty}}">
                        @error('qty')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Price</label>
                        <input type="text" class='form-control' name="price" value="{{$product->price}}">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    </div>

                    <div class="row">
                    <div class="form-group col-md-4">
                        <label>Offer Price</label>
                        <input type="text" class='form-control' name="offer_price" value="{{$product->offer_price}}">
                        @error('offer_price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>Offer start-date</label>
                        <input type="date" class='form-control' name="offer_start_date" value="{{$product->offer_start_date}}">
                        @error('offer_start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>Offer end-date</label>
                        <input type="date" class='form-control' name="offer_end_date" value="{{$product->offer_end_date}}">
                        @error('offer_end_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    </div>
                    
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Product Type</label>
                      <select class="form-control" name="type">
                        <option {{$product->type=='new' ? 'selected':''}} value='new'>New Arrival</option>
                        <option {{$product->type=='featured' ? 'selected':''}} value='featured'>Featured Product</option>
                        <option {{$product->type=='best' ? 'selected':''}} value='best'>Best Seller</option>
                        <option {{$product->type=='top' ? 'selected':''}} value='top'>Top Rated</option>
                      </select>
                      @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option {{$product->status=='active' ? 'selected':''}} value="active">Active</option>
                        <option {{$product->status=='inactive' ? 'selected':''}} value="inactive">Inactive</option>
                      </select>
                    </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
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