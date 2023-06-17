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

@include('front.layouts.header')


@include('front.layouts.navbar')


@yield('content')


@include('front.layouts.footer')   


@include('front.layouts.scripts')   

</body>

</html>