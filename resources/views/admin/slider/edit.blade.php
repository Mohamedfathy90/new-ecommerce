@extends('admin.layouts.master')

@section('title',"Edit Slider")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Homepage Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/slider">Homepage Sliders</a></div>
              <div class="breadcrumb-item"><a href="">Edit Slider</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/slider/{{$slider->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label>Preview</label>
                        <img src="{{$slider->image}}" width="200">
                    </div>
                    <div class="form-group">  
                        <label>Banner</label>
                        <input type="file" class='form-control' name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class='form-control' name="type" value="{{$slider->type}}">
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" class='form-control' name="title" value="{{$slider->title}}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Starting Price</label>
                        <input type="text" class='form-control' name="price" value="{{$slider->price}}">
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Button URL</label>
                        <input type="text" class='form-control' name="url" value="{{$slider->url}}">
                        @error('url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Order</label>
                        <input type="text" class='form-control' name="order" value="{{$slider->order}}">
                        @error('order')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                        @php echo $slider->status==="active"? "selected" :"" @endphp> Active </option>
                        <option value="inactive" 
                        @php echo $slider->status==="inactive"? "selected" :"" @endphp> Inactive </option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
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