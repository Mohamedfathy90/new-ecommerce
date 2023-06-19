@extends('admin.layouts.master')

@section('title',"Create Slider")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create Homepage Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/slider">Homepage Sliders</a></div>
              <div class="breadcrumb-item"><a href="/admin/slider/create">Create Slide</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/slider" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="file" class='form-control' name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class='form-control' name="type" value="{{old('type')}}">
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" class='form-control' name="title" value="{{old('title')}}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Starting Price</label>
                        <input type="text" class='form-control' name="price" value="{{old('price')}}">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Button URL</label>
                        <input type="text" class='form-control' name="url" value="{{old('url')}}">
                        @error('url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Order</label>
                        <input type="text" class='form-control' name="order" value="{{old('order')}}">
                        @error('order')
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