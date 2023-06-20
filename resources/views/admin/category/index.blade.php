@extends('admin.layouts.master')

@section('title',"Main Categories")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Main Categories</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/category">Main Categories</a></div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action">
                    <a href="/admin/category/create" class="btn btn-primary">Create New</a>
                    </div>
                  </div>
                  <div class="card-body">
                  <table class="table table-bordered" id="category-table">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Icon</th>
                    <th>name</th>
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