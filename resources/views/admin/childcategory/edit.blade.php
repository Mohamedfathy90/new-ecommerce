@extends('admin.layouts.master')

@section('title',"Edit Child-Category")

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Child-Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/admin/subcategory">Child-Categories</a></div>
              <div class="breadcrumb-item"><a href="">Edit Child-Category</a></div>
            </div>
          </div>
            
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                  <form action="/admin/childcategory/{{$childcategory->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    
                    <div class="form-group">
                      <label>Main Category</label>
                      <select class="form-control select-category" data-url= "/admin/getsubcategory/" data-subcategory="{{$childcategory->subcategory->id}}" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" 
                        @php echo ($childcategory->subcategory->category->id==$category->id) ? "selected" : "" @endphp>
                        {{$category->name}}
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Sub Category</label>
                      <select class="form-control select-subcategory"  name="subcategory_id">
                      </select>
                    </div>
                   
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class='form-control' name="name" value="{{$childcategory->name}}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="active" 
                        @php echo $childcategory->status==="active"? "selected" :"" @endphp> Active </option>
                        <option value="inactive" 
                        @php echo $childcategory->status==="inactive"? "selected" :"" @endphp> Inactive </option>
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