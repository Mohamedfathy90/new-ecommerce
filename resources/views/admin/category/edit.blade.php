@extends('admin.layouts.master')

@section('title',"Edit category")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Main Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/slider">Main Categories</a></div>
              <div class="breadcrumb-item"><a href="">Edit Category</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/category/{{$category->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    
                    <div class="form-group">  
                        <label>Icon</label>
                        <input type="text" class='form-control' name="icon" value="{{$category->icon}}">
                        @error('icon')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$category->name}}">
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                        @php echo $category->status==="active"? "selected" :"" @endphp> Active </option>
                        <option value="inactive" 
                        @php echo $category->status==="inactive"? "selected" :"" @endphp> Inactive </option>
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