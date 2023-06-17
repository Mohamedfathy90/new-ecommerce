@extends('front.layouts.dashboard')

@section('title' , 'User Profile')

@section ('content')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>
                
                <form action="/user/updateprofile" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-xl-9">
                      <div class="row">
                        
                      <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" value="{{auth()->user()->name}}" name="name">
                          </div>
                          @error('name')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" value="{{auth()->user()->username}}" name="username">
                          </div>
                          @error('username')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="far fa-phone-alt"></i>
                            <input type="text" value="{{auth()->user()->phone}}" name="phone">
                          </div>
                        </div>
                        
                        <div class="col-xl-6 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fal fa-envelope-open"></i>
                            <input type="email" value="{{auth()->user()->email}}" name="email">
                          </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-xl-3 col-sm-6 col-md-6">
                        <div class="wsus__dash_pro_img">
                        <img src=" @php echo(auth()->user()->image)?: '/storage/nophoto.jpg' @endphp"  alt="img" class="img-fluid w-100">
                        <input type="file" name="image">
                        </div>
                        </div>
                        
                        
                        <div class="col-xl-12">
                        <button class="common_btn mb-4 mt-2" type="submit">Update</button>
                        </div>
                      

                    </form>


                      </div>
                    </div>
                  
                    




                    
                    <div class="wsus__dash_pass_change mt-4">
                    <h4>Update Password</h4>
                      <div class="row mt-4">
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-unlock-alt"></i>
                            <input type="password" placeholder="Current Password">
                          </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input type="password" placeholder="New Password">
                          </div>
                        </div>
                        <div class="col-xl-4">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input type="password" placeholder="Confirm Password">
                          </div>
                        </div>
                        <div class="col-xl-12">
                          <button class="common_btn" type="submit">upload</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
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