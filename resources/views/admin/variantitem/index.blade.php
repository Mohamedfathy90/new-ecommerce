@extends('admin.layouts.master')

@section('title',"Variant Items")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h2>Product ({{$product->name}}) <br>
              Items for Variant ({{$productvariant->name}})</h2>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/product"> All Products</a></div>
              <div class="breadcrumb-item"><a href="/admin/productvariant/{{$product->id}}"> Product Variants</a></div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action">
                    <a href="/admin/variantitem/create/{{$productvariant->id}}" class="btn btn-primary">Create New</a>
                    </div>
                  </div>
                  <div class="card-body">
                  <table class="table table-bordered" id="variantitem-table" data-productvariant="{{$productvariant->id}}">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Item Name</th>
                    <th>Variant Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Status</th>
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