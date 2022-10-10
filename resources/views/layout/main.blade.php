<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/images/logo/favicon.ico">

    <!-- page css -->
    <link href="/assets/vendors/apexcharts/dist/apexcharts.css" rel="stylesheet">

    <!-- Core css -->
    <link href="/assets/css/app.min.css" rel="stylesheet">

    @stack('css')

</head>

<body>
    <div class="layout">
        <div class="vertical-layout">
            <!-- Header START -->
            <div class="header-text-dark header-nav layout-vertical">
                <div class="header-nav-wrap">
                    <div class="header-nav-left">
                        <div class="header-nav-item desktop-toggle">
                            <div class="header-nav-item-select cursor-pointer">
                                <i class="nav-icon feather icon-menu icon-arrow-right"></i>
                            </div>
                        </div>
                        <div class="header-nav-item mobile-toggle">
                            <div class="header-nav-item-select cursor-pointer">
                                <i class="nav-icon feather icon-menu icon-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="header-nav-right">
                        <div class="header-nav-item">
                            <div class="dropdown header-nav-item-select nav-profile">
                                <div class="toggle-wrapper" id="nav-profile-dropdown" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-circle avatar-image"
                                        style="width: 35px; height: 35px; line-height: 35px;">
                                        <img src="/assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <span class="fw-bold mx-1">Lisa</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="nav-profile-header">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-circle avatar-image">
                                                <img src="/assets/images/avatars/thumb-1.jpg" alt="">
                                            </div>
                                            <div class="d-flex flex-column ms-1">
                                                <span class="fw-bold text-dark">Lisa Black Pink</span>
                                                <span class="font-size-sm">lisa@themenate.com</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <i class="font-size-lg me-2 feather icon-user"></i>
                                            <span>Profile</span>
                                        </div>
                                    </a>
                                    {{-- <a href="javascript:void(0)" class="dropdown-item">
                                        <div class="d-flex align-items-center"><i
                                                class="font-size-lg me-2 feather icon-power"></i>
                                            <span>Sign Out</span>
                                        </div>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header END -->

            @include('layout.sidebar')

            <!-- Content START -->
            <div class="content">
                @yield('container')

                <!-- Footer START -->
                <div class="footer">
                    <div class="footer-content">
                        <p class="mb-0">Copyright © 2021. All rights reserved.</p>
                        <span>
                            <a href="" class="text-gray me-3">Term &amp; Conditions</a>
                            <a href="" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </div>
                <!-- Footer End -->
            </div>
            <!-- Content END -->
        </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="/assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="/assets/vendors/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>

    <!-- Core JS -->
    <script src="/assets/js/app.min.js"></script>
    
    <script>
        setTimeout(function() {
            $(".success_message").fadeOut('slow');
        }, 3000);
    </script>
    
    @stack('js')

</body>

</html>
