<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('icon-hpc.png') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body>
    <!-- Header -->
    @include('includes.header')
    <!-- Content -->
    @yield('content')
    <!-- Footer -->
    @include('includes.footer')
    <!-- Javascript -->
    @yield('js')
</body>

</html>