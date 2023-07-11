@extends('admin.layouts.master')

@section('title',"Flash Sale")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Flash Sale</h1>
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
                <h4>Flash Sale End Date</h4>
                </div>
                <div class="card-body">  
                  <form action="/admin/flashsale" method="post">
                    @csrf
                    <div class="form-group">
                    <input class='form-control date-picker' type="date" name="end_date">
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                  </form>
                 </div>
                 <div class="card-header">
                <h4>Add Flash Sale Products</h4>
                </div>
                <div class="card-body">  
                  <form action="/admin/add-flashsale-item" method="post">
                    @csrf
                    <div class="form-group">
                    <select class='form-control select2' type="text" name="product_id">
                      @foreach($products as $product)  
                      <option value="{{$product->id}}">{{$product->name}}</option>
                      @endforeach
                    </select> 
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                  </form>
                 </div>
                  <div class="card-body">
                  <table class="table table-bordered" id="flashsale-table" >
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Product</th>
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