@extends('admin.layouts.master')

@section('title',"Sellers-Products")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Sellers-Products</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product">My Products</a></div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                 
                  <div class="card-body">
                  
                  <table class="table table-bordered" id="sellerproduct-table">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Thumbnail</th>
                    <th>name</th>
                    <th>Vendor</th>
                    <th>Brand</th>
                    <th>Main Category</th>
                    <th>Price</th>
                    <th>Type</th>
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