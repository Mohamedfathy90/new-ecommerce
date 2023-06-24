@extends('admin.layouts.master')

@section('title',"Child Categories")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Child Categories</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/subcategory">Sub Categories</a></div>
              <div class="breadcrumb-item"><a href="/admin/childcategory">Child Categories</a></div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action">
                    <a href="/admin/childcategory/create" class="btn btn-primary">Create New</a>
                    </div>
                  </div>
                  <div class="card-body">
                  <table class="table table-bordered" id="childcategory-table">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Child Category</th>
                    <th>Main Category</th>
                    <th>Sub-Category</th>
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