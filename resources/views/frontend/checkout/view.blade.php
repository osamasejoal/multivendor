@extends('frontend.layouts.master')

@section('main-content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="{{ route('frontpage') }}">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <form action="{{ route('checkout.post') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-lg-8">
                        <div class="checkout-form form-style">
                            <h3>Billing Details</h3>
                            <div class="row billing-details">

                                {{-- Name --}}
                                <div class="col-sm-6 col-12 field-div">
                                    <p>Name *</p>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-sm-6 col-12 field-div">
                                    <p>Email Address *</p>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Phone number --}}
                                <div class="col-sm-12 col-12 field-div">
                                    <p>Phone No. *</p>
                                    <input type="text" name="phone">

                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Country --}}
                                <div class="col-sm-6 col-12 field-div">
                                    <p>Country *</p>
                                    <select name="country" id="country-dropdown" style="background-color:aliceblue">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Town/City --}}
                                <div class="col-sm-6 col-12 field-div">
                                    <p>Town/City *</p>
                                    <select name="city" id="city-dropdown" disabled style="background-color:aliceblue">
                                        <option value="">Select a City</option>
                                    </select>

                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div class="col-12 field-div">
                                    <p>Your Address *</p>
                                    <input type="text" name="address">

                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Postal code --}}
                                <div class="col-sm-6 col-12 field-div">
                                    <p>Postcode/ZIP *</p>
                                    <input type="number" name="postcode">

                                    @error('postal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                {{-- Shipping another address --}}
                                {{-- <div class="col-12">
                                    <input id="toggle1" type="checkbox">
                                    <label for="toggle1">Pure CSS Accordion</label>
                                    <div class="create-account">
                                        <p>Create an account by entering the information below. If you are a returning
                                            customer please login at the top of the page.</p>
                                        <span>Account password</span>
                                        <input type="password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input id="toggle2" type="checkbox">
                                    <label class="fontsize" for="toggle2">Ship to a different address?</label>
                                    <div class="row" id="open2">
                                        <div class="col-12">
                                            <p>Country</p>
                                            <select id="s_country">
                                                <option value="1">Select a country</option>
                                                <option value="2">bangladesh</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">Afghanistan</option>
                                                <option value="5">Ghana</option>
                                                <option value="6">Albania</option>
                                                <option value="7">Bahrain</option>
                                                <option value="8">Colombia</option>
                                                <option value="9">Dominican Republic</option>
                                            </select>
                                        </div>
                                        <div class=" col-12">
                                            <p>First Name</p>
                                            <input id="s_f_name" type="text" />
                                        </div>
                                        <div class=" col-12">
                                            <p>Last Name</p>
                                            <input id="s_l_name" type="text" />
                                        </div>
                                        <div class="col-12">
                                            <p>Company Name</p>
                                            <input id="s_c_name" type="text" />
                                        </div>
                                        <div class="col-12">
                                            <p>Address</p>
                                            <input type="text" placeholder="Street address" />
                                        </div>
                                        <div class="col-12">
                                            <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                        </div>
                                        <div class="col-12">
                                            <p>Town / City </p>
                                            <input id="s_city" type="text" placeholder="Town / City" />
                                        </div>
                                        <div class="col-12">
                                            <p>State / County </p>
                                            <input id="s_county" type="text" />
                                        </div>
                                        <div class="col-12">
                                            <p>Postcode / Zip </p>
                                            <input id="s_zip" type="text" placeholder="Postcode / Zip" />
                                        </div>
                                        <div class="col-12">
                                            <p>Email Address </p>
                                            <input id="s_email" type="email" />
                                        </div>
                                        <div class="col-12">
                                            <p>Phone </p>
                                            <input id="s_phone" type="text" placeholder="Phone Number" />
                                        </div>
                                    </div>
                                </div> --}}



                                <div class="col-12 field-div">
                                    <p>Order Notes </p>
                                    <textarea name="order_notes" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- Order details --}}
                    <div class="col-lg-4">
                        <div class="order-area">
                            <h3>Your Order</h3>
                            <ul class="total-cost">

                                {{-- product --}}
                                <li class="order-main-li">
                                    <div class="mb-3" style="font-weight: 700">
                                        <span>Product</span>
                                        <span class="pull-right">Price</span>
                                    </div>
                                    <ul>
                                        @foreach ($carts as $cart)
                                            <li> {{ $cart->relationToProduct->name }} ({{ $cart->amount }}p)
                                                <span
                                                    class="pull-right">${{ $cart->relationToProduct->price * $cart->amount }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                {{-- finance --}}
                                <li class="order-main-li">
                                    <ul>
                                        <li>Cart Total <span
                                                class="pull-right">${{ Session::get('s_cart_total') }}</span>
                                        </li>
                                        <li>Discount
                                            ({{ Session::get('s_coupon_code') ? Session::get('s_coupon_code') : 'N/A' }})
                                            <span class="pull-right">${{ Session::get('s_discount') }}</span>
                                        </li>
                                        <li class="font-weight-bold">Subtotal <span
                                                class="pull-right">${{ Session::get('s_subtotal') }}</span> </li>
                                    </ul>
                                </li>

                                {{-- Shipping --}}
                                <li class="order-main-li">Shipping
                                    <span class="pull-right">${{ Session::get('s_shipping') }}
                                    </span>
                                </li>
                                <li class="order-main-li g-total-cost">Grand Total
                                    <span class="pull-right">${{ Session::get('s_subtotal') }}
                                    </span>
                                </li>
                            </ul>
                            <ul class="payment-method">
                                <li>
                                    <input id="op" type="radio" name="payment_option" value="2">
                                    <label class="ml-2" for="op">Online Payment</label>
                                </li>
                                <li>
                                    <input id="cod" type="radio" name="payment_option" value="1">
                                    <label class="ml-2 mb-0" for="cod">Cash on Delivery</label>
                                </li>
                                @error('payment_option')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </ul>
                            <button type="submit">Place Order</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection

@section('script-content')
    <script>
        $('document').ready(function() {
            $('#country-dropdown').change(function() {
                $('#city-dropdown').attr('disabled', false);
                var country_id = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/city/list',
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        $('#city-dropdown').html(data);
                    }
                })
            })
        });
    </script>
@endsection
