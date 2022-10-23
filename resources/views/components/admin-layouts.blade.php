<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{config('app_name')}}</title>
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('assets/css/style-starter.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/font-awesome.css')}}">
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="sidebar-menu-collapsed">
    @include('admin.inc.header')
    <div class="main-content">

      <!-- content -->
      <div class="container-fluid content-top-gap">
{{$slot}}
      </div>
    </div>
    @include('admin.inc.footer')