<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('backend')}}/assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/css/components.css">




<!-- Bootstrap-Iconpicker -->
<!-- <link rel="stylesheet" href="dist/css/bootstrap-iconpicker.min.css"/> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css">
  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

