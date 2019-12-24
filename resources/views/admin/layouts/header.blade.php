<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ !empty($title)?$title:trans('admin.adminpanel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/plugins/fontawesome-free/css/all.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('desighn/style') }}/css/bootstrap-datepicker.min.css">

  @if(direction() == 'ltr')
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/dist/css/adminlte.min.css">
  @else

  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/dist/css/rtl/bootstrap-rtl.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/dist/css/rtl/rtl.css">
  
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/dist/css/rtl/admintle.css">



  

  @endif
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('/') }}/desighn/AdminPanelDesighn/jstree/themes/default/style.css">
  <link rel="stylesheet" href="{{ url('desighn/style') }}/css/bootstrap-datepicker.min.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

  <script src="{{ url('desighn/AdminPanelDesighn/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
</head>