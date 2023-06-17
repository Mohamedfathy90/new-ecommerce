
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
  
  <title>@yield('title')</title>
 
  @include('front.layouts.styles')   


  <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>

<!--=============================
    DASHBOARD MENU START
  ==============================-->
  <div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
      <img src="@php echo (auth()->user()->image)?: '/storage/nophoto.jpg' @endphp" alt="img" class="img-fluid">
      <p>{{auth()->user()->name}}</p>
    </div>
  </div>
  <!--=============================
    DASHBOARD MENU END
  ==============================-->

  <section id="wsus__dashboard">
    <div class="container-fluid">
      <div class="dashboard_sidebar">
        <span class="close_icon">
          <i class="far fa-bars dash_bar"></i>
          <i class="far fa-times dash_close"></i>
        </span>
        <a href="/user/dashboard" class="dash_logo"><img src="/frontend/images/logo.png" alt="logo" class="img-fluid"></a>
        <ul class="dashboard_link">
          <li><a class="active" href="/user/dashboard"><i class="fas fa-tachometer"></i>Dashboard</a></li>
          <li><a href="dsahboard_order.html"><i class="fas fa-list-ul"></i> Orders</a></li>
          <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> Downloads</a></li>
          <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
          <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
          <li><a href="/{{auth()->user()->role}}/profile"><i class="far fa-user"></i> My Profile</a></li>
          <li><a href="dsahboard_address.html"><i class="fal fa-gift-card"></i> Addresses</a></li>
          <li><form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">
                <i class="far fa-sign-out-alt"></i>
                Log Out
                </a>
                </form></li>
        </ul>
      </div>

      @yield('content')


       <!--============================
      SCROLL BUTTON START
    ==============================-->
  <div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
  </div>
  <!--============================
    SCROLL BUTTON  END
  ==============================-->

  @include('front.layouts.scripts')   
</body>

</html>

