@extends('admin.layouts.master')

@section('title',"Create Category")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create Main Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/category">Homepage Sliders</a></div>
              <div class="breadcrumb-item"><a href="/admin/category/create">Create Slide</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/category" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <div role="iconpicker" name="icon" data-align="left" data-label-header="Select Icon" data-rows="3" data-cols="6" ></div>
                    @error('icon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                         
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>
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