@extends('admin.layouts.master')

@section('title',"Homepage Sliders")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Homepage Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/slider">Homepage Slider</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Simple Table</h4>
                    <div class="card-header-action">
                    <a href="/admin/slider/create" class="btn btn-primary">Create New</a>
                    </div>
                  </div>
                  <div class="card-body">
                  <table class="table table-bordered" id="datatable-crud">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Order</th>
                    <th>status</th>
                    <th>url</th>
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



