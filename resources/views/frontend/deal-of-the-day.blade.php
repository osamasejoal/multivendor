@extends('frontend.layouts.master')

@section('main-content')


    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Deal of the Day</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">

            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">



                        @forelse ($deals as $deal)

                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img src="{{ asset('backend/assets/images/product-img/' . $deal->image) }}" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                        href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>


                                                @if (wishlist_exist($deal->id))
                                                    <li><a><i class="fa fa-heart" style="color: yellow"></i></a></li>
                                                @else
                                                    <li><a href="{{ route('add.wishlist', $deal->id) }}"><i class="fa fa-heart"></i></a></li>
                                                @endif


                                                @if (cart_exist($deal->id))
                                                    <li><a><i class="fa fa-shopping-bag" style="color: yellow"></i></a></li>
                                                @else
                                                    <li><a href="{{ route('add.cart', $deal->id) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                                @endif


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="single-product.html">{{ $deal->name }}</a></h3>
                                        <p class="pull-left">{{ '$' . $deal->price }}

                                        </p>
                                        <ul class="pull-right d-flex">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                        @empty

                            <div style="font-weight: 600; font-size: 25px"
                                class="alert alert-info m-auto col-12 text-center p-5">
                                There are no Product in this Category
                            </div>

                        @endforelse



                        {{-- <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>New</span>
                                    <img src="{{asset('frontend/assets')}}/images/product/11.jpg" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                    href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                    <p class="pull-left">$125

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>New</span>
                                    <img src="{{asset('frontend/assets')}}/images/product/11.jpg" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                    href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                    <p class="pull-left">$125

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}



                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- product-area end -->


@endsection
