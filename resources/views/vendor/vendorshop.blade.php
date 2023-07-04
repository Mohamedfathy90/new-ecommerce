@extends('front.layouts.dashboard')

@section('title' , 'Vendor Shop Profile')


@section('content')
<div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9" style="margin-left: 230px;">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fas fa-shopping-cart"></i> Shop-Profile</h3>
            <div class="card">
              <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Preview</label>
                        <img src="{{$vendor->banner}}" width="200">
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Banner</label>
                        <input type="file" class='form-control' name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$vendor->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label>Email</label>
                        <input type="email" class='form-control' name="email" value="{{$vendor->email}}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Phone</label>
                        <input type="text" class='form-control' name="phone" value="{{$vendor->phone}}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Address</label>
                        <input type="text" class='form-control' name="address" value="{{$vendor->address}}">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Description</label>
                        <textarea class="summernote" name="description">"{{$vendor->description}}"</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Facebook URL</label>
                        <input type="text" class='form-control' name="fb_link" value="{{$vendor->fb_link}}">
                        @error('fb_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Twitter URL</label>
                        <input type="text" class='form-control' name="tw_link" value="{{$vendor->tw_link}}" >
                        @error('tw_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4">
                        <label>Instagram URL</label>
                        <input type="text" class='form-control' name="inst_link" value="{{$vendor->inst_link}}">
                        @error('inst_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                
                    </form>
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
 