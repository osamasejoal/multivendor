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
                                                <input type="text" value="{{ $cart->amount }}"
                                                    name="amount[ {{ $cart->id }} ]" />
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

                                        <form action="{{ route('view.carts') }}" method="get">

                                            <input type="text"
                                                value="{{ session('code_name') ? session('code_name') : $coupon }}"
                                                placeholder="Coupon Code" name="coupon_code">
                                            <button type="submit">Apply Coupon</button>

                                        </form>

                                        @if (session('coupon_error'))
                                            <span class="text-danger">{{ session('coupon_error') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">

                                    <h3>Cart Totals</h3>
                                    <ul>
                                        @php
                                            Session::put('s_coupon_code', $coupon);
                                            Session::put('s_cart_total', $cart_total);
                                            Session::put('s_discount', $discount);
                                            Session::put('s_subtotal', $cart_total - $discount);
                                            Session::put('s_shipping', 30);
                                        @endphp
                                        <li>
                                            <span class="pull-left">Cart total </span>$ {{ $cart_total }}
                                        </li>

                                        <li>
                                            <span class="pull-left">Discount ({{ $coupon ? $coupon : 'N/A' }})
                                            </span>$ {{ $discount }}
                                        </li>

                                        <li>
                                            <span class="pull-left">Subtotal </span>
                                            $
                                            <span id="subtotal">{{ $cart_total - $discount }}</span>
                                        </li>

                                        <div class="mt-5">
                                            <p class="d-flex mb-2" style="font-size:18px;font-weight:500">Shipping</p>
                                            <ul>
                                                <li class="mb-1">
                                                    <input id="radio-one" class="radio-btn pull-left mx-3"
                                                        style="margin: 0.4rem" type="radio" name="shipping">
                                                    <span class="pull-left" style="font-size: 15px;">Express</span>
                                                    $50
                                                </li>
                                                <li class="mb-1" style="font-weight:500;font-size:15px">
                                                    <input checked id="radio-two" class="radio-btn pull-left mx-3"
                                                        style="margin: 0.4rem" type="radio" name="shipping">
                                                    <span class="pull-left" style="font-size: 15px;">Standard</span>
                                                    $30
                                                </li>
                                                <li class="mb-1" style="font-weight:500;font-size:15px">
                                                    <input id="radio-three" class="radio-btn pull-left mx-3"
                                                        style="margin: 0.4rem" type="radio" name="shipping">
                                                    <span class="pull-left" style="font-size: 15px;">Free</span>
                                                    $0
                                                </li>
                                            </ul>
                                        </div>

                                        <hr class="my-4" style="background-color: #a7a7a7">

                                        <li class="text-danger">
                                            <span class="pull-left"> Grand Total </span>
                                            $
                                            <span id="grandtotal">{{ $cart_total - $discount + 30 }}</span>
                                        </li>
                                    </ul>

                                    @if ($stock_status)
                                        <div class="alert alert-danger mt-4">
                                            Remove stock out products.
                                        </div>
                                    @else
                                        <a href="{{ route('checkout') }}">Proceed to Checkout</a>
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

@section('script-content')
    <script>
        $('document').ready(function() {

            $('#radio-one').click(function() {
                $('#grandtotal').html(parseInt($('#subtotal').html()) + 50);
                @php
                    Session::put('s_shipping', 50);
                @endphp
            });

            $('#radio-two').click(function() {
                $('#grandtotal').html(parseInt($('#subtotal').html()) + 30);
                @php
                    Session::put('s_shipping', 30);
                @endphp
            });

            $('#radio-three').click(function() {
                $('#grandtotal').html(parseInt($('#subtotal').html()) + 0);
                @php
                    Session::put('s_shipping', 0);
                @endphp
            });
        });
    </script>
@endsection
