<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/assets') }}/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- all css here -->

    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/bootstrap.min.css">

    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/owl.carousel.min.css">

    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/font-awesome.min.css">

    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/flaticon.css">

    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/jquery-ui.css">

    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/metisMenu.min.css">

    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/swiper.min.css">

    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/styles.css">

    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/responsive.css">

    <!-- Style for Form -->
    <link rel="stylesheet" href="{{ asset('custom/form/style.css') }}">

    <!-- modernizr css -->
    <script src="{{ asset('frontend/assets') }}/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>

    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>

    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here end -->

    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">

                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i>{{ company_data()->phone }}</li>
                            <li><i class="fa fa-envelope"></i>{{ company_data()->email }}</li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">

                            @auth
                                <li>
                                    <a href="javascript:void(0);"><img width="25px"
                                            src="{{ asset('backend/assets/images/profile-pic/' . auth()->user()->image) }}"
                                            alt=""> My Account <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">

                                        @if (auth()->user()->roll == 3)
                                            <li><a href="{{ route('customer.profile.update') }}">Profile</a></li>
                                        @else
                                            <li><a href="{{ route('home') }}">Dashboard</a></li>
                                        @endif

                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="{{ route('view.wishlist') }}">wishlist</a></li>
                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">logout</a>
                                            <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="d-flex">
                                    <a href="{{ route('login') }}"> Login </a> /
                                    <a href="{{ route('register') }}"> Register </a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ route('frontpage') }}">
                                <img src="{{ asset('backend/assets/images/company-logo/' . company_data()->logo) }}"
                                    alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active"><a href="{{ route('frontpage') }}">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li>
                                    <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="blog.html">blog Page</a></li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a>
                            </li>



                            @auth

                                <li>
                                    <a href="{{ route('view.wishlist') }}"><i class="flaticon-like"></i>

                                        @if (count(wishlists()) > 0)
                                            <span>{{ count(wishlists()) }}</span>
                                        @endif

                                    </a>


                                    <ul class="{{ count(wishlists()) > 0 ? 'cart-wrap dropdown_style' : 'd-none' }}">
                                        @foreach (wishlists() as $wishlist)
                                            <li class="cart-items">
                                                <div class="cart-img">
                                                    <img width="50px"
                                                        src="{{ asset('backend/assets/images/product-img/' . $wishlist->relationToProduct->image) }}"
                                                        alt="">
                                                </div>
                                                <div class="cart-content">
                                                    <a
                                                        href="{{ route('view.wishlist') }}">{{ $wishlist->relationToProduct->name }}</a>
                                                    <a href="{{ route('delete.wishlist', $wishlist->id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"><i class="flaticon-like"></i></a>
                                </li>

                            @endauth



                            @auth

                                <li>
                                    <a href="{{ route('view.carts') }}"><i class="flaticon-shop"></i>

                                        @if (count(carts()) > 0)
                                            <span>{{ carts()->count() }}</span>
                                        @endif

                                    </a>


                                    <ul class="{{ count(carts()) > 0 ? 'cart-wrap dropdown_style' : 'd-none' }}">
                                        @foreach (carts() as $cart)
                                            <li class="cart-items">

                                                <div class="cart-img">
                                                    <img width="50px"
                                                        src="{{ asset('backend/assets/images/product-img/' . $cart->relationToProduct->image) }}"
                                                        alt="">
                                                </div>

                                                <div class="cart-content">
                                                    <a href="cart.html">{{ $cart->relationToProduct->name }}</a>
                                                    <span>QTY : {{ $cart->amount }}</span>
                                                    <p>{{ '$' . $cart->relationToProduct->price }}</p>
                                                    <a href="{{ route('delete.cart', $cart->id) }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>

                                            </li>
                                        @endforeach
                                        @if (count(carts()) > 0)
                                            <li>
                                                <a href="#" class="checkout">Check out</a>
                                            </li>
                                        @endif
                                    </ul>

                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"><i class="flaticon-shop"></i></a>
                                </li>

                            @endauth



                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->
