@extends('admin.layouts.master')

@section('title',"Vendor Profile")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Vendor Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/vendor-profile">Vendor Profile</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/vendor-profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="file" class='form-control' name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
               
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class='form-control' name="email" value="{{old('email')}}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class='form-control' name="phone" value="{{old('phone')}}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class='form-control' name="address" value="{{old('address')}}">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="summernote" name="description">{{old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Facebook URL</label>
                        <input type="text" class='form-control' name="fb-link" value="{{old('fb-link')}}">
                        @error('fb-link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Twitter URL</label>
                        <input type="text" class='form-control' name="tw-link" value="{{old('tw-link')}}">
                        @error('tw-link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Instagram URL</label>
                        <input type="text" class='form-control' name="inst-link" value="{{old('inst-link')}}">
                        @error('inst-link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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