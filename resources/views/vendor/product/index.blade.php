@extends('front.layouts.dashboard')

@section('title' , 'All Products')


@section('content')
<div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9" style="margin-left: 230px;">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fas fa-shopping-cart"></i> Shop-Profile</h3>
            <div class="card">
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
                    <th>Type</th>
                    <th>Available Qty</th>
                    <th>status</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->



 @endsection
 