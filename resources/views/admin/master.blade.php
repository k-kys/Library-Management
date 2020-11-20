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
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte-v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte-v3/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed" style="height: auto;">


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
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"
            style="top: 57px; height: 610px; display: none; bottom: 31px;">
            <!-- Control sidebar content goes here -->
            <div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-overflow os-host-overflow-y os-host-transition"
                style="height: 610px;">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: -16px; width: 249px; height: 609px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                        <div class="os-content" style="padding: 16px; height: 100%; width: 100%;">
                            <h5>Customize AdminLTE</h5>
                            <hr class="mb-2">
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>No Navbar
                                    border</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body small text</span>
                            </div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar small
                                    text</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav small
                                    text</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Footer small
                                    text</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav flat
                                    style</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav legacy
                                    style</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav
                                    compact</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav child
                                    indent</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Main Sidebar disable
                                    hover/focus auto expand</span></div>
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Brand small
                                    text</span></div>
                            <h6>Navbar Variants</h6>
                            <div class="d-flex">
                                <div class="d-flex flex-wrap mb-3">
                                    <div class="bg-primary elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-secondary elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-info elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-success elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-danger elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-indigo elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-purple elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-pink elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-navy elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-lightblue elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-teal elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-cyan elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-dark elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-gray-dark elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-gray elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-light elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-warning elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-white elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                    <div class="bg-orange elevation-2"
                                        style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                    </div>
                                </div>
                            </div>
                            <h6>Accent Color Variants</h6>
                            <div class="d-flex"></div>
                            <div class="d-flex flex-wrap mb-3">
                                <div class="bg-primary elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-warning elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-info elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-danger elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-success elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-indigo elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-lightblue elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-navy elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-purple elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-fuchsia elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-pink elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-maroon elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-orange elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-lime elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-teal elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-olive elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                            </div>
                            <h6>Dark Sidebar Variants</h6>
                            <div class="d-flex"></div>
                            <div class="d-flex flex-wrap mb-3">
                                <div class="bg-primary elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-warning elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-info elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-danger elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-success elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-indigo elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-lightblue elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-navy elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-purple elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-fuchsia elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-pink elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-maroon elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-orange elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-lime elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-teal elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-olive elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                            </div>
                            <h6>Light Sidebar Variants</h6>
                            <div class="d-flex"></div>
                            <div class="d-flex flex-wrap mb-3">
                                <div class="bg-primary elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-warning elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-info elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-danger elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-success elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-indigo elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-lightblue elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-navy elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-purple elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-fuchsia elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-pink elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-maroon elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-orange elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-lime elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-teal elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-olive elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                            </div>
                            <h6>Brand Logo Variants</h6>
                            <div class="d-flex"></div>
                            <div class="d-flex flex-wrap mb-3">
                                <div class="bg-primary elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-secondary elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-info elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-success elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-danger elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-indigo elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-purple elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-pink elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-navy elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-lightblue elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-teal elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-cyan elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-dark elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-gray-dark elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-gray elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-light elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-warning elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-white elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div>
                                <div class="bg-orange elevation-2"
                                    style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;">
                                </div><a href="javascript:void(0)">clear</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px); width: 100%;"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px); height: 47.2136%;">
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>
        </aside>
        <div id="sidebar-overlay"></div>
    </div>




    <!-- jQuery -->
    <script src="{{ asset('adminlte-v3/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte-v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte-v3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte-v3/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlte-v3/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlte-v3/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte-v3/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlte-v3/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte-v3/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte-v3/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte-v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte-v3/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte-v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-v3/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlte-v3/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte-v3/dist/js/demo.js') }}"></script>
    <!-- AdminLTE -->

    {{-- -------------------------------------------------------------------- --}}

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('adminlte-v3/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminlte-v3/dist/js/demo.js') }}"></script>
    <script src="{{ asset('adminlte-v3/dist/js/pages/dashboard3.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('adminlte-v3/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('adminlte-v3/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('adminlte-v3/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('adminlte-v3/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte-v3/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{ asset('adminlte-v3/dist/js/pages/dashboard2.js') }}"></script>

    <div class="daterangepicker ltr show-ranges opensright">
        <div class="ranges">
            <ul>
                <li data-range-key="Today">Today</li>
                <li data-range-key="Yesterday">Yesterday</li>
                <li data-range-key="Last 7 Days">Last 7 Days</li>
                <li data-range-key="Last 30 Days">Last 30 Days</li>
                <li data-range-key="This Month">This Month</li>
                <li data-range-key="Last Month">Last Month</li>
                <li data-range-key="Custom Range">Custom Range</li>
            </ul>
        </div>
        <div class="drp-calendar left">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default"
                type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled"
                type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none; left: 831.047px; top: 450px;">North Carolina</div>



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
