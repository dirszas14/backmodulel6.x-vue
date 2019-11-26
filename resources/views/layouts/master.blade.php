<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <title>Default @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    @yield('header')
   @yield('grocery')
    <!-- Styles -->
    <link href="{{ asset('papers/css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
            .loader {
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: #F5F8FA;
                z-index: 9998;
                text-align: center;
            }
    
            .plane-container {
                position: absolute;
                top: 50%;
                left: 50%;
            }
    </style>
</head>

    <body class="light">

        <!-- Pre loader -->
        <div id="loader" class="loader">
            <div class="plane-container">
                <div class="preloader-wrapper small active">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                    </div>

                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                    </div>

                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                    </div>

                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts._sidebar')
        {{-- toggle button --}}
 <div class="has-sidebar-left">
        <div class="navbar navbar-expand d-flex navbar-dark justify-content-between bd-navbar blue accent-3 shadow">
                <div class="relative">
                    <div class="d-flex">
                        <div>
                            <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                                <i></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Top Menu Start -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages-->
                <li class="dropdown custom-dropdown messages-menu">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                           <i class="icon-message "></i>
                           {{-- <span class="badge badge-success badge-mini rounded-circle">4</span> --}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu pl-2 pr-2">
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            {{-- <img src="assets/img/dummy/u4.png" alt=""> --}}
                                            <span class="avatar-badge busy"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            {{-- <img src="assets/img/dummy/u1.png" alt=""> --}}
                                            <span class="avatar-badge online"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            {{-- <img src="assets/img/dummy/u2.png" alt=""> --}}
                                            <span class="avatar-badge idle"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            {{-- <img src="assets/img/dummy/u3.png" alt=""> --}}
                                            <span class="avatar-badge busy"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer s-12 p-2 text-center"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications -->
                <li class="dropdown custom-dropdown notifications-menu">
                    <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-notifications "></i>
                        {{-- <span class="badge badge-danger badge-mini rounded-circle">4</span> --}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="icon icon-data_usage text-success"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-data_usage text-danger"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon icon-data_usage text-yellow"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer p-2 text-center"><a href="#">View all</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link " data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class=" icon-search3 "></i>
                    </a>
                </li>
                <!-- Right Sidebar Toggle Button -->
                <li>
                    <a class="nav-link ml-2" data-toggle="control-sidebar">
                        <i class="icon-tasks "></i>
                    </a>
                </li>
                <!-- User Account-->
                <li class="dropdown custom-dropdown user user-menu ">
                <a href="/auth/logout" class="nav-link">
                        {{-- <img src="assets/img/dummy/u8.png" class="user-image" alt="User Image"> --}}
                        {{-- <i class="icon-more_vert "></i> --}}Logout
                    </a>
                </li>
            </ul>
        </div>
            </div>
 </div>
<div class="page has-sidebar-left">
        @yield('headernav')
        
            <div class="container-fluid animatedParent animateOnce my-3">
        @yield('content')
            </div>
</div>
        
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        <script src="{{ asset('papers/js/app.js') }}"></script>
{{-- <script src="{{asset('js/jquery.masknumber.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="http://malsup.github.io/jquery.blockUI.js"></script>
        @yield('footer')
    </body>

</html>