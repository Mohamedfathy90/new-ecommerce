@include ('admin.layouts.header')

<body>
  <div id="app">
  <div class="main-wrapper main-wrapper-1">






@include ('admin.layouts.navbar')
      
@include ('admin.layouts.sidebar')     
      
      
      
      @yield('content')
      
      
@include ('admin.layouts.footer') 

  
@include ('admin.layouts.scripts') 

</body>
</html>