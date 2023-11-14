    @extends('layouts.app')


    @section('content')
        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="">home</a></li>
                                <li><a href="">product</a></li>
                                <li>{{ $product->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <!--product details start-->
        <div class="product_details mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1"
                                class="d-flex justify-content-center detail-img zoomWrapper single-zoom pt-2 pb-2">
                                <a href="#">
                                    <img class="img-fluid" src="/products/{{ $product->image }}" alt="big-1">
                                </a>
                            </div>
                            {{-- <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="">
                                        <img src="/products/{{ $product->image }}"/>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 align-self-center">
                        <div class="product_d_right">
                            <div>

                                <h1>{{ $product->name }}</h1>
                                @if ($product->discount)
                                    <div class="price_box">
                                        <span
                                            class="current_price">₦{{ number_format($product->price - ($product->discount * $product->price) / 100) }}</span>
                                        <span class="old_price">₦{{ number_format($product->price) }}</span>
                                    </div>
                                @else
                                    <div class="price_box">
                                        <span class="current_price">₦{{ number_format($product->price) }}</span>
                                    </div>
                                @endif
                                <div class="product_desc">
                                    <p>{!! Str::words($product->description, 34) !!}</p>
                                </div>

                                @if ($product->hasCart(Auth::user()))
                                    <div class="product_variant quantity removewrapper{{ $product->id }}">
                                        <label>quantity</label>
                                        <input onchange="updateQuantity({{ $product->id}}, {{ Auth::user()->id }} )" 
                                        name="input{{ $product->id }}" value="{{ $product->cartQuantity(Auth::user()) }}" min="1" max="50" type="number">
                                    </div>
                                @endif

                                <div class="action_links">
                                    <ul>
                                        @if ($product->hasCart(Auth::user()))
                                            <li class="add_to_cart">
                                                <form action="{{ route('delete-cart', $product) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline btn-dark"
                                                        style="border-radius: 18px" title="add to cart"><i
                                                            class="fa fa-shopping-cart"></i> remove from
                                                        cart</button>
                                                </form>
                                            </li>
                                        @else
                                            <li class="add_to_cart">
                                                <form action="{{ route('add-cart', $product) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline btn-dark"
                                                        style="border-radius: 18px" title="add to cart"><i
                                                            class="fa fa-shopping-cart"></i> add to
                                                        cart</button>
                                                </form>
                                            </li>
                                        @endif
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                        <li class="compare"><a href="#" title="compare"><i
                                                    class="zmdi zmdi-swap"></i></a></li>
                                    </ul>
                                </div>


                                <div class="product_meta">
                                    <span class="text-capitalize">Category: <a
                                            href="#">{{ $product->category }}</a></span>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--product details end-->

        <!--product info start-->
        <div class="product_d_info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#info" role="tab"
                                            aria-controls="info" aria-selected="false">Description</a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                            aria-selected="false">Specification</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="first_child">Brand</td>
                                                        @if($product->brand)
                                                        <td>{{ $product->brand }}</td>
                                                        @else
                                                        <td> unavailable </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Colour</td>
                                                        @if($product->colour)
                                                        <td>{{ $product->colour }}</td>
                                                        @else
                                                        <td> unavailable </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Size</td>
                                                        @if($product->size)
                                                        <td>{{ $product->size }}</td>
                                                        @else
                                                        <td> unavailable </td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>

                                {{-- <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        <h2>1 review for Donec eu furniture</h2>
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src="/web/assets/img/blog/comment2.jpg" alt="">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <div class="star_rating">
                                                        <ul>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p><strong>admin </strong>- September 12, 2018</p>
                                                    <span>roadthemes</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="comment_title">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked </p>
                                        </div>
                                        <div class="product_ratting mb-10">
                                            <h3>Your rating</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_review_form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="review_comment">Your review </label>
                                                        <textarea name="comment" id="review_comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="author">Name</label>
                                                        <input id="author" type="text">

                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email">Email </label>
                                                        <input id="email" type="text">
                                                    </div>
                                                </div>
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product info end-->

        <!--product area start-->
        <section class="product_area related_products mb-47">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Related Products</h2>
                        </div>
                        <div class="product_carousel product_column4 owl-carousel">
                          
                            @foreach($products as $related)
                            <x-product-component :product="$related" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--product area end-->


     
        <script>
            var userId = {{ Auth::user() ? Auth::user()->id : '' }};
            var products = @json($products);


            if(userId != ''){
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
    @endsection
