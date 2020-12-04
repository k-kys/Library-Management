<!DOCTYPE html>
<html lang="en" style="height: auto;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') | Online Library Management</title>
    <link rel="icon" href="{{ asset('icon-hpc.png') }}">

    {{-- link của select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/dist/css/adminlte.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="sidebar-mini hold-transition layout-fixed" style="height: auto;">


    <div class="wrapper">
        <!-- Main Sidebar -->
        @include('admin.includes.sidebar')
        <div class="content-wrapper" style="min-height: 1330.44px;">
            @include('admin.includes.header')
            <section class="content-header">
                @yield('content-header')
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- Main Footer -->
        @include('admin.includes.footer')
    </div>


    @yield('js')


    <!-- jQuery -->
    <script src="{{ asset('adminlte-v3/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte-v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte-v3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-v3/dist/js/adminlte.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function(event) {
                let isDelete = confirm('Bạn có chắc chắn muốn xóa ?');
                if (!isDelete) {
                    event.preventDefault();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2()
        });
    </script>
</body>

</html>