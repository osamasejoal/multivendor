@extends('frontend.layouts.master')

@section('main-content')

    @if (count(carts()) > 0)
        <!-- .breadcumb-area start -->
        <div class="breadcumb-area bg-img-4 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Shopping Cart</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><span>Shopping Cart</span></li>
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
                            <table class="table-responsive cart-wrap">
                                <thead>
                                    <tr>
                                        <th class="images">Image</th>
                                        <th class="product">Product</th>
                                        <th class="ptice">Price</th>
                                        <th class="quantity">Quantity</th>
                                        <th class="total">Total</th>
                                        <th class="remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('cart.update') }}" method="post">
                                        @csrf

                                    @php
                                        $cart_total = 0;
                                        $stock_status = false;
                                    @endphp

                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="images"><img
                                                    src="{{ asset('backend/assets/images/product-img/' . $cart->relationToProduct->image) }}"
                                                    alt=""></td>
                                            <td class="product"><a
                                                    href="{{ route('single.product', $cart->product_id) }}">{{ $cart->relationToProduct->name }}</a>
                                                <br>
                                                <div class="text-primary">
                                                    Vendor: {{ get_vendor($cart->relationToProduct->user_id) }}
                                                </div>
                                                <div class="">
                                                    Stock:
                                                    @if ($cart->relationToProduct->quantity >= 1)
                                                        {{ $cart->relationToProduct->quantity }}
                                                    @else
                                                        @php
                                                            $stock_status = true;
                                                        @endphp
                                                        <span class="text-danger">
                                                            Unavailable
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="price">$ {{ $cart->relationToProduct->price }}</td>
                                            <td class="quantity cart-plus-minus">
                                                <input type="text" value="{{ $cart->amount }}" name="amount[ {{ $cart->id }} ]" />
                                            </td>
                                            <td class="total">$
                                                {{ $cart->relationToProduct->price * $cart->amount }}</td>
                                            @php
                                                $cart_total += $cart->relationToProduct->price * $cart->amount;
                                            @endphp
                                            <td class="remove">
                                                <a href="{{ route('delete.cart', $cart->id) }}"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row mt-60">
                                <div class="col-xl-4 col-lg-5 col-md-6 ">
                                    <div class="cartcupon-wrap">
                                        <ul class="d-flex">
                                            <li>
                                                <button type="submit">Update Cart</button>
                                            </li>


                                            </form>


                                            <li><a href="{{ route('frontpage') }}">Continue Shopping</a></li>
                                        </ul>
                                        <h3>Coupon</h3>
                                        <p>Enter Your Coupon Code if You Have One</p>
                                        <div class="cupon-wrap">
                                            <input type="text" placeholder="Coupon Code">
                                            <button>Apply Coupon</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                    <div class="cart-total text-right">

                                        <h3>Cart Totals</h3>
                                        <ul>
                                            <li><span class="pull-left">Subtotal </span>$ {{ $cart_total }}</li>
                                            <li><span class="pull-left"> Total </span> $ {{ $cart_total }}</li>
                                        </ul>

                                        @if ($stock_status)
                                            <div class="alert alert-danger mt-4">
                                                Remove stock out products.
                                            </div>
                                        @else
                                            <a href="checkout.html">Proceed to Checkout</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-area end -->
    @else
        <div style="height: 80vh" class="d-flex">

            <div style="display: grid" class="m-auto">
                <p class="mb-4">There are no items in this cart</p>
                <a href="{{ route('frontpage') }}" class="text-center btn btn-outline-info">continue shopping</a>
            </div>

        </div>
    @endif



@endsection
