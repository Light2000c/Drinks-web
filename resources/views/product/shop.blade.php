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
                                <li>shop right sidebar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--shop  area start-->
        <div class="shop_area shop_sidebar mt-50 mb-50">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-12">
                        <!--shop wrapper start-->
                        <!--shop toolbar start-->
                        <div class="shop_banner">
                            <img src="/web/assets/img/bg/banner29.jpg" alt="">
                        </div>
                        <div class="shop_title">
                            <h1>shop</h1>
                        </div>
                        <div class="shop_toolbar_wrapper">
                            <div class="shop_toolbar_btn">

                                <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                                    title="3"></button>

                                <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                                    title="4"></button>

                                <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                                    title="List"></button>
                            </div>
                            <div class=" niceselect_option">

                                <form class="select_option" action="#">
                                    <select name="orderby" id="short">

                                        <option selected value="1">Sort by average rating</option>
                                        <option value="2">Sort by popularity</option>
                                        <option value="3">Sort by newness</option>
                                        <option value="4">Sort by price: low to high</option>
                                        <option value="5">Sort by price: high to low</option>
                                        <option value="6">Product Name: Z</option>
                                    </select>
                                </form>


                            </div>
                            <div class="page_amount">
                                <p>Showing 1–9 of 21 results</p>
                            </div>
                        </div>
                        <!--shop toolbar end-->

                        <div class="row no-gutters shop_wrapper">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-12 ">
                                    <x-product-component :product="$product" />
                                </div>
                            @endforeach
                        </div>

                        <div class="shop_toolbar t_bottom">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <!--sidebar widget start-->
                        <aside class="sidebar_widget">
                            <div class="shop_sidebar_banner mb-50">
                                <a href="#"><img src="/web/assets/img/bg/banner16.jpg" alt=""></a>
                            </div>
                            <form action="{{ route('shop') }}" method="post">
                                @csrf
                                <div class="widget_list widget_categories">
                                    <h2>categories</h2>
                                    @foreach ($categories as $category)
                                        <div>
                                            <div class="form-check ms-3 mb-2">
                                                <input class="form-check-input checkbox" name="category"
                                                    style="font-size: 16px" type="checkbox" value="{{ $category->title }}"
                                                    id="flexCheckIndeterminate">
                                                <label class="form-check-label" style="font-size: 16px"
                                                    for="flexCheckIndeterminate">
                                                    {{ $category->title }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="widget_list widget_filter mb-3">
                                    <h2>Filter by price</h2>
                                    {{-- <form action="#"> --}}
                                    <div id="form-filter">
                                        <div id="slider-range"></div>
                                        <input type="text" name="price" id="amount" />
                                    </div>
                                    {{-- </form> --}}
                                </div>

                                
                                    <div class="d-grid mb-5" style="width: 100%">
                                        <button type="submit" class="btn btn-primary btn-block">Apply Filter</button>
                                    </div>
                            </form>

                            <div class="widget_list recent_product">
                                <h2>Top Rated Products</h2>
                                <div class="recent_product_container">
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img src="/web/assets/img/s-product/product.jpg"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Natus erro</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product2.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Nemo enim</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product3.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Consequuntur magni</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product4.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Cras neque</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product5.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Endurance2</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product6.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Crown Summit1</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product7.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Compete Hoodie3</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product3.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Crown Summit1</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product4.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Crown Summit1</a></h3>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product5.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Crown Summit1</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product6.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Crown Summit1</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_product_list">
                                        <div class="recent_product_thumb">
                                            <a href="product-details.html"><img
                                                    src="/web/assets/img/s-product/product7.jpg" alt=""></a>
                                        </div>
                                        <div class="recent_product_content">
                                            <h3><a href="product-details.html">Crown Summit1</a></h3>
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </aside>
                        <!--sidebar widget end-->
                    </div>
                </div>
            </div>
        </div>
        <!--shop  area end-->

        <script>
            var userId = {{ Auth::user() ? Auth::user()->id : '' }};
            var products = @json($products);


            if (userId != '') {
                $('document').ready(async function() {
                    await load(userId);
                    console.log(products.data);
                    let data = products.data;

                    data.forEach(element => {
                        if (checkCart(element.id)) {
                            $('.addwrapper' + element.id).hide();
                            $('.removewrapper' + element.id).show();
                            console.log("id", element.id);
                        }
                    });
                });
            }
        </script>

        <script>
            const checkboxes = document.querySelectorAll('.checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        checkboxes.forEach(cb => {
                            if (cb !== this) {
                                cb.checked = false;
                            }
                        });
                    }
                });
            });
        </script>
    @endsection
