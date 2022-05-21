<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

    <!-- App css -->
    {{-- Bootstrap 4 --}}
    <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- Style for Form -->
    <link rel="stylesheet" href="{{ asset('custom/form/style.css') }}">

    {{-- Style for Table --}}
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('custom/table/css/style.css') }}">

    <script src="{{ asset('backend') }}/assets/js/modernizr.min.js"></script>

</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">

            <div class="slimscroll-menu" id="remove-scroll">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="{{ asset('backend') }}/assets/images/logo.png" alt="" height="22">
                        </span>
                        <i>
                            <img src="{{ asset('backend') }}/assets/images/logo_sm.png" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="{{ asset('backend/assets/images/profile-pic/' . auth()->user()->image) }}"
                            alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    </div>
                    <h5><a href="#">{{ auth()->user()->name }}</a> </h5>
                    <p class="text-muted">
                        @if (auth()->user()->roll == 1)
                            Admin
                        @elseif (auth()->user()->roll == 2)
                            Vendor
                        @else
                            Customer
                        @endif
                    </p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <!--<li class="menu-title">Navigation</li>-->

                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fi-air-play"></i>
                                Dashboard
                            </a>
                        </li>

                        @if (auth()->user()->roll == 1)
                            <li>
                                <a href="javascript: void(0);"><i class="icon-target"></i> <span> Vendors </span>
                                    <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('vendor.create') }}">Add Vendors</a></li>
                                    <li><a href="{{ route('vendor.index') }}">View Vendors</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="mdi mdi-account-multiple"></i> <span> Customers
                                    </span>
                                    <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('customer.create') }}">Add Customers</a></li>
                                    <li><a href="{{ route('customer.index') }}">View Customers</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Category </span>
                                    <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('category.create') }}">Add Category</a></li>
                                    <li><a href="{{ route('category.index') }}">View Category</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="icon-drawar"></i> <span>Sub Category </span>
                                    <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('sub-category.create') }}">Add Sub category</a></li>
                                    <li><a href="{{ route('sub-category.index') }}">View Sub category</a></li>
                                </ul>
                            </li>
                        @endif

                        @if (auth()->user()->roll == 2)
                            <li>
                                <a href="javascript: void(0);"><i class="icon-ghost"></i> <span>Product</span> <span
                                        class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('product.create') }}">Add Product</a></li>
                                    <li><a href="{{ route('product.index') }}">View Product</a></li>
                                </ul>
                            </li>
                        @elseif (auth()->user()->roll == 1)
                            <li>
                                <a href="{{ route('product.index') }}">
                                    <i class="icon-ghost"></i>
                                    Product
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->roll == 1)
                            <li>
                                <a href="javascript: void(0);"><i class="icon-ghost"></i> <span>Coupon</span> <span
                                        class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('coupon.create') }}">Add Coupon</a></li>
                                    <li><a href="{{ route('coupon.index') }}">View Coupon</a></li>
                                </ul>
                            </li>
                        @endif

                        @if (auth()->user()->roll == 1)
                            <li>
                                <a href="javascript: void(0);"><i class="icon-energy"></i> <span>Company</span> <span
                                        class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('edit.company') }}">Company Profile</a></li>
                                    <li><a href="{{ route('company-social.create') }}">Add Social Media</a></li>
                                    <li><a href="{{ route('company-social.index') }}">View Social Media</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-share"></i> <span>Front Design</span>
                                    <span class="menu-arrow"></span></a>

                                <ul class="nav-second-level nav" aria-expanded="false">

                                    <li><a href="javascript: void(0);" aria-expanded="false">Banner<span
                                                class="menu-arrow"></span></a>

                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{ route('banner.create') }}">Add Banner</a></li>
                                            <li><a href="{{ route('banner.index') }}">View Banner</a></li>
                                        </ul>

                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Testimonial<span
                                                class="menu-arrow"></span></a>

                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{ route('testimonial.create') }}">Add Testimonial</a></li>
                                            <li><a href="{{ route('testimonial.index') }}">View Testimonial</a></li>
                                        </ul>

                                    </li>

                                </ul>

                            </li>
                        @endif

                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="icon-power"></i> Logout </span>
                            </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>

                </div>
                <!-- Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="hide-phone app-search">
                            <form>
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="fi-bell noti-icon"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0"><span class="float-right"><a href=""
                                                class="text-dark"><small>Clear All</small></a> </span>Notification
                                    </h5>
                                </div>

                                <div class="slimscroll" style="max-height: 230px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i
                                                class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small
                                                class="text-muted">1 min ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">5
                                                hours ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small
                                                class="text-muted">3 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i
                                                class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small
                                                class="text-muted">4 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">7
                                                days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small
                                                class="text-muted">13 days ago</small></p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="fi-speech-bubble noti-icon"></i>
                                <span class="badge badge-custom badge-pill noti-icon-badge">6</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0"><span class="float-right"><a href=""
                                                class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                                </div>

                                <div class="slimscroll" style="max-height: 230px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img
                                                src="{{ asset('backend') }}/assets/images/users/avatar-2.jpg"
                                                class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our
                                            next meeting</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img
                                                src="{{ asset('backend') }}/assets/images/users/avatar-3.jpg"
                                                class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Sam Garret</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img
                                                src="{{ asset('backend') }}/assets/images/users/avatar-4.jpg"
                                                class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img
                                                src="{{ asset('backend') }}/assets/images/users/avatar-5.jpg"
                                                class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Sherry Marshall</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our
                                            next meeting</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img
                                                src="{{ asset('backend') }}/assets/images/users/avatar-6.jpg"
                                                class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Shawn Millard</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('backend/assets/images/profile-pic/' . auth()->user()->image) }}"
                                    alt="user" class="rounded-circle"> <span
                                    class="ml-1">{{ auth()->user()->name }}<i
                                        class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('frontpage') }}" class="dropdown-item notify-item">
                                    <i class="icon-directions"></i> <span>Front Page</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-help"></i> <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-lock"></i> <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                    class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Logout</span>
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard </h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Welcome to Highdmin admin panel !</li>
                                </ol>
                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->



            <!-- Start Page content -->
