@extends('layouts.front-master')

@section('front-content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Wishlist</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Wishlist</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('warning'))
                        <div class="alert alert-warning text-center">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <form action="http://themepresss.com/tf/html/tohoney/cart">
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="addcart">Add to Cart</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wishlists as $wishlist)
                                    <tr>
                                        <td class="images"><img width="100px"
                                                src="{{ asset('backend/assets/images/product-img/' . $wishlist->relationToProduct->image) }}"
                                                alt=""></td>
                                        <td class="product"><a
                                                href="{{ route('single.product', $wishlist->product_id) }}">{{ $wishlist->relationToProduct->name }}</a>
                                        </td>
                                        <td class="ptice">${{ $wishlist->relationToProduct->price }}</td>
                                        <td class="addcart"><a
                                                href="{{ route('add.cart', $wishlist->product_id) }}">Add to Cart</a></td>
                                        <td class="remove"><a
                                                href="{{ route('delete.wishlist', $wishlist->id) }}"><i
                                                    class="fa fa-times"></i></a></td>
                                    </tr>
                                @empty
                                    <tr colspan="50">There are no product in Wishlist</tr>
                                @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->

@endsection
