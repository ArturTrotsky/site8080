<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/file.css">
    <link href="/fonts/Ubuntu/ubuntu.css" rel="stylesheet" type="text/css">

    <style>
        html, body {
            font-family: 'Ubuntu', Ubuntu;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @include('layouts.header')
    @include('layouts.left_sidebar')

    {{--@yield('content')--}}
    @section('content')
    @show

    @include('layouts.footer')

    <aside class="control-sidebar control-sidebar-dark"></aside>

</div>

<script src="/js/file.js"></script>

@section('page-script')
@show

<script>$('[data-widget="pushmenu"]').PushMenu('toggle')</script>
</body>
</html>
