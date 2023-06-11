@extends('admin.layouts.master')
@section('title','Admin Profile')

@section ('content')

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, {{auth()->user()->name}}</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
             
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" action='/admin/profile' class="needs-validation" >
                    @csrf
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          
                        <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" name ='name' class="form-control" value="{{auth()->user()->name}}" required="">
                          </div>
                          
                          <div class="form-group col-md-6 col-12">
                            <label>Username</label>
                            <input type="text" class="form-control" value="{{auth()->user()->username}}" disabled>
                          </div>
                        </div>
                        
                        <div class="row">
                          
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" name='email' class="form-control" value="{{auth()->user()->email}}" required="">
                          </div>
                      
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" name='phone' class="form-control" value="{{auth()->user()->phone}}">
                          </div>
                        </div>
                        
                      
                      
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>





@endsection