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
                  <form method="post" action='/admin/updateprofile' class="needs-validation" enctype="multipart/form-data">
                    
                    @csrf
                    <div class="card-header">
                      <h4>Personal Information</h4>
                    </div>
                    <div class="card-body">
                    <img src="{{auth()->user()->image}}" width="150" height="150">     
                        
                        <div class="row mt-3">                               
                        <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" name ='name' class="form-control" value="{{auth()->user()->name}}" required="">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                      
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" name='phone' class="form-control" value="{{auth()->user()->phone}}">
                          </div>
                        </div>
                        
                        <div class="row">
                          
                          <div class="form-group col-md-7 col-12">
                            <label>Profile Image</label>
                            <input type="file" name='image' class="form-control">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
            <div class="row mt-sm-4">
             
             <div class="col-12 col-md-12 col-lg-7">
               <div class="card">
                 <form method="post" action='/admin/updatepassword' class="needs-validation">
                   @csrf
                   <div class="card-header">
                     <h4>Update Password</h4>
                   </div>
                   <div class="card-body">
                       <div class="row">                               
                         
                         <div class="form-group col-md-7 col-12">
                           <label>Current Password</label>
                           <input type="password" name ='current_password' class="form-control"  required="">
                           @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                    
                        </div>
                       
                       <div class="row">
                         
                         <div class="form-group col-md-7 col-12">
                           <label>New Password</label>
                           <input type="password" name ='password' class="form-control"  required="">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                  
                       </div>
                       
                       <div class="row">
                         
                         <div class="form-group col-md-7 col-12">
                           <label>Confirm Password</label>
                           <input type="password" name ='password_confirmation' class="form-control"  required="">
                         </div>
                  
                       </div>
                       
                     
                     
                   <div class="card-footer text-right">
                     <button class="btn btn-primary">Update Password</button>
                   </div>
                 </form>
               </div>
             </div>
           </div>


          </div>
        </section>
      </div>





@endsection