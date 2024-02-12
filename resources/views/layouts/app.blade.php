<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pallas - eCommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/web/assets/img/favicon.ico">

    <!-- CSS
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/web/assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/web/assets/css/style.css">

    <link rel="stylesheet" href="/personal/personal.css">

    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    {{-- <script src="jquery-3.6.4.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>



</head>

<body>

    <!--header area start-->
    <header class="header_area">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="welcome_text">
                            <p>Welcome to <span> Drinks</span> </p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="top_right text-right">
                            <ul>
                                <li class="top_links"><a><i class="fa fa-user"></i> {{ Auth::user()->fullname ?? "My account" }} </a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{ route('account') }}">Profile</a></li>
                                        <li><a href="{{ route('cart') }}">Cart</a></li>
                                        <li><a href="{{ route('profile-wishlist') }}">Wishlist</a></li>
                                        <li class="mt-2 mb-2">
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <div class="d-grid">
                                                    <button class="btn btn-danger" type="submit">Logout</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--header top start-->
        <!--header center area start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="index.html"><img src="/web/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="header_middle_inner">
                            <div class="search-container">
                                <form action="" method="post">
                                    @csrf
                                    <div class="search_box">
                                        <input name="keyword" id="keyword" placeholder="Search product..."
                                            type="text">
                                        <button type="button" id="submitBtn"><i class="zmdi zmdi-search"></i></button>
                                    </div>
                                </form>
                                {{-- <script>
                                    $("#submitBtn").click(function () {
                                        var keyword = document.getElementById("keyword").value;

                                        console.log(keyword);

                                        window.location.href = `http://127.0.0.1:8000/search/${keyword}`;
                                    });
                                </script> --}}
                            </div>
                            <div class="mini_cart_wrapper">
                                @if (!Auth::user())
                                    <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket">
                                        </i> <span> 0 - $00 </span> </a>
                                @else
                                    <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket">
                                        </i> <span>{{ $vCarts->count() . ' - ₦' . number_format($vCartsTotal) }}</span>
                                    </a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        @foreach ($vCarts->slice(0, 2) as $cart)
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a class="pt-1 pb-1" href="#"
                                                        style="display: flex; justify-content: center"><img
                                                            src="products/{{ $cart->product->image }}"
                                                            style="height: 80px" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">{{ $cart->product->name }}</a>

                                                    <span class="quantity">Qty: {{ $cart->quantity }}</span>
                                                    <span
                                                        class="price_cart">₦{{ number_format($cart->product->price) }}</span>

                                                </div>
                                                <div class="cart_remove">
                                                    <form action="{{ route('delete-cart', $cart->product) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn"><i
                                                                class="fa fa-close"></i></button>
                                                    </form>

                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mini_cart_table">
                                            <div class="cart_total">
                                                <span>Subtotal:</span>
                                                <span class="price">₦{{ number_format($vCartsTotal) }}</span>
                                            </div>
                                        </div>

                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="{{ route('cart') }}">View cart</a>
                                                <a href="checkout.html">Checkout</a>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header center area end-->

        <!--header middel start-->
        <div class="header_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="main_menu menu_two header_position">
                            <nav>
                                <ul>

                                    <li class="active"><a href="{{ route('home') }}"><i class="fa fa-home"></i>
                                            home</a>
                                    </li>
                                    <li class="active"><a href="{{ route('shop') }}"><i
                                                class="fa fa-shopping-bag"></i>
                                            Shop</a>
                                    </li>
                                    {{-- <li class="active"><a href="{{ route('home') }}"><i class="fa fa-question"></i>
                                            Faq</a>
                                    </li> --}}
                                    <li class="active"><a href="{{ route('about') }}"><i
                                                class="fa fa-info-circle"></i>
                                            About</a>
                                    </li>
                                    <li class="active"><a href="{{ route('contact') }}"><i
                                                class="fa fa-address-book"></i> Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->

    </header>
    <!--header area end-->

    <!--Offcanvas menu area start-->

    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <span>MENU</span>
                        <a href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="welcome_text">
                            <p>Welcome to <span>Drinks</span> </p>
                        </div>

                        <div class="top_right">
                            <ul>
                                <li class="top_links"><a href="#"><i class="fa fa-user"></i>  {{ Auth::user()->fullname ?? "My account" }}</a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{ route('account') }}">Profile</a></li>
                                        <li><a href="{{ route('cart') }}">Cart</a></li>
                                        <li><a href="{{ route('profile-wishlist') }}">Wishlist</a></li>
                                        <li class="mt-2 mb-2">
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <div class="d-grid">
                                                    <button class="btn btn-danger" type="submit">Logout</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <div class="search-container">
                            <form action="" method="post">
                                @csrf
                                <div class="search_box">
                                    <input name="keyword" id="keyword2" placeholder="Search product..."
                                        type="text">
                                    <button type="button" id="submitBtn2"><i class="zmdi zmdi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="mini_cart_wrapper">
                            @if (!Auth::user())
                                <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket">
                                    </i> <span> 0 - $00 </span> </a>
                            @else
                                <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket">
                                    </i> <span>{{ $vCarts->count() . ' - ₦' . number_format($vCartsTotal) }}</span>
                                </a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    @foreach ($vCarts->slice(0, 2) as $cart)
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a class="pt-1 pb-1" href="#"
                                                    style="display: flex; justify-content: center"><img
                                                        src="products/{{ $cart->product->image }}"
                                                        style="height: 80px" alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">{{ $cart->product->name }}</a>

                                                <span class="quantity">Qty: {{ $cart->quantity }}</span>
                                                <span
                                                    class="price_cart">₦{{ number_format($cart->product->price) }}</span>

                                            </div>
                                            <div class="cart_remove">
                                                <form action="{{ route('delete-cart', $cart->product) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn"><i
                                                            class="fa fa-close"></i></button>
                                                </form>

                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Subtotal:</span>
                                            <span class="price">₦{{ number_format($vCartsTotal) }}</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="{{ route('cart') }}">View cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            <!--mini cart end-->
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('shop') }}">Shop</a>
                                </li>
                                {{-- <li class="menu-item-has-children">
                                    <a href="#">Faq</a>
                                </li> --}}
                                <li class="menu-item-has-children">
                                    <a href="{{ route('about') }}">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('contact') }}"> Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->



    @yield('content')




    <!--brand newsletter area start-->
    <div class="brand_newsletter_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="/web/assets/img/brand/brand.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/web/assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/web/assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/web/assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/web/assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/web/assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/web/assets/img/brand/brand1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="newsletter_inner">
                        <div class="newsletter_content">
                            <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
                        </div>
                        <div class="newsletter_form">
                            <form action="#">
                                <input placeholder="Email..." type="text">
                                <button type="submit"><i class="zmdi zmdi-mail-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->


    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widgets_container contact_us">
                            <a href="index.html"><img src="/web/assets/img/logo/logo.png" alt=""></a>
                            <p>
                                Welcome to Drinks, where refreshing beverages await! Explore our wide range of drinks,
                                from soft to Alcohol, catering to every taste.</p>
                            <div class="footer_contact">
                                <ul>
                                    <li><i class="zmdi zmdi-home"></i><span>Addresss:</span> 2 Fauconberg Rd,Chiswick,
                                        London</li>
                                    <li><i class="zmdi zmdi-phone-setting"></i><span>Phone:</span><a
                                            href="tel:(+1) 866-540-3229">(+1) 866-540-3229</a> </li>
                                    <li><i class="zmdi zmdi-email"></i><span>Email:</span> info@plazathemes.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                                <div class="widgets_container widget_menu">
                                    <h3>Quick Links</h3>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                                <div class="widgets_container widget_menu">
                                    <h3>Categories</h3>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="about.html">Wine</a></li>
                                            <li><a href="#">Beer</a></li>
                                            <li><a href="#">Whisky</a></li>
                                            <li><a href="#">Tequila</a></li>
                                            <li><a href="blog.html">Cognac</a></li>
                                            <li><a href="#">Gin</a></li>
                                            <li><a href="#">Champagne</a></li>
                                            <li><a href="#">vodka</a></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2023 <a href="#"> pallas </a> All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="footer_payment text-right">
                            <p><img src="/web/assets/img/icon/payment.png" alt=""></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->


    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/web/assets/img/product/product37.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/web/assets/img/product/product24.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/web/assets/img/product/product25.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/web/assets/img/product/product22.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1"
                                                    role="tab" aria-controls="tab1" aria-selected="false"><img
                                                        src="/web/assets/img/product/productbig1.jpg"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab2"
                                                    role="tab" aria-controls="tab2" aria-selected="false"><img
                                                        src="/web/assets/img/product/productbig2.jpg"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"
                                                    role="tab" aria-controls="tab3" aria-selected="false"><img
                                                        src="/web/assets/img/product/productbig4.jpg"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab4"
                                                    role="tab" aria-controls="tab4" aria-selected="false"><img
                                                        src="/web/assets/img/product/productbig5.jpg"
                                                        alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                            laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                            in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                            recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="0" max="100" step="2" value="1"
                                                    type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest"><a href="#"><i
                                                        class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i
                                                        class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal area end-->



    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="/web/assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="/web/assets/js/main.js"></script>

    <script src="/personal/personal.js"></script>

    <script>
        $("#submitBtn").click(function () {
            var keyword = document.getElementById("keyword").value;

            console.log(keyword);

            window.location.href = `http://127.0.0.1:8000/search/${keyword}`;
        });

        $("#submitBtn2").click(function () {
        var keyword2 = document.getElementById("keyword2").value;

        console.log(keyword2);

        window.location.href = `http://127.0.0.1:8000/search/${keyword2}`;
    });
    </script>

</body>

</html>
