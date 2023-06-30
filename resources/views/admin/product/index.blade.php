@extends('admin.layouts.master')

@section('title',"Products")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Products</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product">All Products</a></div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action">
                    <a href="/admin/product/create" class="btn btn-primary">Add New Product</a>
                    </div>
                  </div>
                  <div class="card-body">
                  <table class="table table-bordered" id="product-table">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Thumbnail</th>
                    <th>name</th>
                    <th>Vendor</th>
                    <th>Brand</th>
                    <th>Main Category</th>
                    <th>Price</th>
                    <th>SKU</th>
                    <th>Available Qty</th>
                    <th>status</th>
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