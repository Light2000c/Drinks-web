@extends('layouts.app')


@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="shopping_cart_area mt-60">
        <div class="container">

            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-9 col-md-6">
                        {{-- <div class="coupon_code left">
                            <h3>Customer ADDRESS</h3>
                            <div class="coupon_inner">
                                <h4>{{ Auth::user()->fullname }}</h4>
                                <p>Enter your coupon code if you have one.</p>
                            </div>
                        </div> --}}
                        <div class="border mb-5">
                            <div class="border-bottom p-3">
                                <div class="d-flex justify-content-between">
                                    <h4>CUSTOMER ADDRESS</h4>
                                    <a>Change <i class="fa fa-angle-right" style="font-size: 18px;"></i></a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4>{{ Auth::user()->fullname }}</h4>
                                <h6>Mama Mudiagha, Orhuwhorun, Delta State, Nigeria.</h6>
                            </div>
                        </div>

                        <div class="border mb-5">
                            <div class="border-bottom p-3">
                                <div class="d-flex justify-content-between">
                                    <h4>DELIEVERY DETAILS</h4>

                                </div>
                            </div>
                            <div class="p-3">
                                <div class="mb-4">
                                    <span class="me-2">
                                        <input type="radio" name="delivery" id="">
                                    </span>
                                    <span>Pick Up Station</span>
                                    <p>Delivery between 08 November and 09 November</p>
                                </div>

                                <div class=""> 
                                    <div class="border p-3">
                                        <h6>Switch to a pickup station starting from ₦760</h6>
                                        <h6>Delivery between 08 November and 09 November</h6>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>

                            <div class="p-3">
                                <div class="mb-4">
                                    <span class="me-2">
                                        <input type="radio" name="payment" id="">
                                    </span>
                                    <span>Door Delivery</span>
                                    <p>Delivery between 08 November and 09 November</p>
                                </div>

                                <div class=""> 
                                    <div class="border p-3">
                                        <h6>Switch to a pickup station starting from ₦760</h6>
                                        <h6>Delivery between 08 November and 09 November</h6>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="border">
                            <div class="border-bottom p-3">
                                <div class="d-flex justify-content-between">
                                    <h4>PAYMENT</h4>

                                </div>
                            </div>
                            <div class="p-3">
                                <div class="mb-4">
                                    <span class="me-2">
                                        <input type="radio" name="delivery" id="">
                                    </span>
                                    <span>Pay With Cards, Bank Transfer or USSD</span>
                                    <p>You will be redirected to our secure checkout page</p>
                                </div>

                                <div class="border">
                                    <div>
                                        <button class="btn"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="coupon_code right">
                            <h3>Order Summary</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Total Items ({{ $totalItems}})</p>
                                    <p class="cart_amount">₦{{ number_format($cartTotal) }}</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Delivery Fee</p>
                                    <p class="cart_amount">Unknown</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">₦{{ number_format($cartTotal) }}</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{ route('confirm-order') }}">Confirm Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->

        </div>
    </div>
@endsection
