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
                <div class="">
                    <div class="row d-flex justify-content-center mb-4">
                        <div class="col-lg-9 col-md-6">
                            <div class="border">
                                <div>
                                    <div class="d-flex justify-content-between border-bottom p-3">
                                        <h5>ORDER SUMMARY</h5>
                                        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">See Details <i class="fa fa-angle-right" style="font-size: 18px;"></i></button>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between p-3">
                                        <h5>TOTAL AMOUNT TO PAY</h5>
                                        <h5>₦{{ number_format($total) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mb-4">
                        <div class="col-lg-9 col-md-6">
                            <div class="border">
                                <div>
                                    <div class="border-bottom p-3">
                                        <h5>PAYMENT METHOD</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between p-3">
                                        <h5>Pay with USSD or BankTransfer</h5>
                                        <h5>
                                           <span><i class="fa fa-cc-mastercard" style="font-size: 22px;"></i></span>
                                           <span><i class="fa fa-cc-visa" style="font-size: 22px;"></i></span>
                                           <span><i class="fa fa-mobile-phone" style="font-size: 22px;"></i></span>
                                            </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Beginning form input --}}

                    {{-- End of form input --}}

                    <div class="row d-flex justify-content-center mb-4">
                        <div class="col-lg-9 col-md-6">
                            <form action="{{ route('pay') }}" method="post">
                                @csrf
                            <div class="d-grid">
                                <button type="submit"  class="btn btn-primary btn-block btn-lg" >Pay Now  ₦{{ number_format($total) }}</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->

        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <div class="modal-body"> --}}
            @foreach($carts as $cart)
          <div class="border-bottom border-top p-3">
              <h5>{{ $cart->product->name }}</h5>
              <p>Quantity: {{ $cart->quantity }}</p>
          </div>
          @endforeach
        {{-- </div> --}}
        <div class="" >
            <div class="m-3">
          <div class="d-flex justify-content-between" >
            <h5>TOTAL TO PAY</h5>
           
            <h5>₦{{ number_format($total) }}</h5>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
