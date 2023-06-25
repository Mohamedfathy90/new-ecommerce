@extends('admin.layouts.master')

@section('title',"Brands")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Brands</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/brand">Brands</a></div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action">
                    <a href="/admin/brand/create" class="btn btn-primary">Create New</a>
                    </div>
                  </div>
                  <div class="card-body">
                  <table class="table table-bordered" id="brand-table">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Logo</th>
                    <th>name</th>
                    <th>status</th>
                    <th>Featured</th>
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