@extends('admin.layouts.master')

@section('title',"Product Images")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Product Images</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product"> All Products</a></div>
            </div>
          </div>
          <div class="section-body">
          <div class="row">
          <div class="col-12">
           <div class="card">
                <div class="card-header">
                <h4>Add Product Images</h4>
                </div>
                <div class="card-body">  
                  <form action="/admin/productimage/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <input class='form-control' type="file" name="image[]" multiple>
                    </div>
                    <button class="btn btn-primary" type="submit">Upload</button>
                  </form>
                 </div>
             
                  <div class="card-body">
                  <table class="table table-bordered" id="productimage-table" data-product="{{$product->id}}">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    </table>
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