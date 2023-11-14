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

        <!--shopping cart area start -->
        <div class="shopping_cart_area mt-60">
            <div class="container">
                <form action="#">
                    <div class="cart-mobile mb-5">
                        @foreach ($carts as $cart)
                            <div class="row border m-2 p-2 pb-2 ">
                                <div class="col-3 border">
                                    <div class="d-flex justify-content-center pt-1 pb-1">
                                        <a href="{{ route('product-details', $cart->product) }}"><img class="img-fluid" src="/products/{{ $cart->product->image }}" alt=""
                                            style="height: 100px"></a>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <h5><a href="{{ route('product-details', $cart->product) }}">{{ $cart->product->name }}</a></h5>
                                    <p>₦{{ number_format($cart->product->price) }}</p>
                                    <div>
                                        <input style="width: 50px;"
                                            onchange="updateQuantity({{ $cart->product->id }}, {{ Auth::user()->id }} )"
                                            name="input{{ $cart->product->id }}" min="1"
                                            value="{{ $cart->quantity }}" type="number">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <form action="{{ route('delete-cart', $cart->product) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-primary"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row cart-dt">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_thumb">Product Name</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                                <th class="product_remove">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td class="product_thumb"><a href=""><img class="img-fluid"
                                                                src="/products/{{ $cart->product->image }}" alt=""
                                                                style="height: 100px"></a></td>
                                                    <td class="product_name"><a
                                                            href="">{{ $cart->product->name }}</a></td>
                                                    <td class="product-price">₦{{ number_format($cart->product->price) }}
                                                    </td>
                                                    <td class="product_quantity"><label>Quantity</label> <input
                                                            onchange="updateQuantity({{ $cart->product->id }}, {{ Auth::user()->id }} )"
                                                            name="input{{ $cart->product->id }}" min="1"
                                                            value="{{ $cart->quantity }}" type="number">
                                                    </td>
                                                    <td class="product_total">
                                                        ₦{{ number_format($cart->product->price * $cart->quantity) }}
                                                    </td>
                                                    <td class="product_remove">
                                                        <form action="{{ route('delete-cart', $cart->product) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-outline"><i
                                                                    class="fa fa-trash-o"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="m-3">
                                    {{ $carts->links('pagination::bootstrap-5') }}
                                </div>
                                <div class="cart_submit">
                                    <button type="submit">update cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                        <p>Enter your coupon code if you have one.</p>
                                        <input placeholder="Coupon code" type="text">
                                        <button type="submit">Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Cart Totals</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">₦{{ number_format($total) }}</p>
                                        </div>
                                        <div class="cart_subtotal ">
                                            <p>Shipping</p>
                                            <p class="cart_amount"><span>Flat Rate:</span> ₦0.00</p>
                                        </div>
                                        <a href="#">Calculate shipping</a>

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">₦{{ number_format($total) }}</p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>
            </div>
        </div>
        <!--shopping cart area end -->
    @endsection
