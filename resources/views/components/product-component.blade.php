@if (Auth::user())
    <div class="single_product">
        <div class="product_thumb">
            <div class="d-flex justify-content-center mb-2 mt-2">
                <a href="{{ route('product-details', $product) }}"><img src="/products/{{ $product->image }}"
                        alt="" style="height: 200px;"></a>
            </div>
            <div class="label_product">
                <span class="label_sale">sale</span>
            </div>
        </div>
        <div class="product_content grid_content">
            <div class="product_name">
                <h3><a href="{{ route('product-details', $product) }}">{{ Str::limit($product->name, 25) }}</a>
                </h3>
            </div>
            <div class="price_box">
                @if ($product->discount)
                    <span
                        class="current_price">₦{{ number_format($product->price - ($product->discount * $product->price) / 100) }}</span>
                    <span class="old_price">₦{{ number_format($product->price) }}</span>
                @else
                    <span class="current_price">₦{{ number_format($product->price) }}</span>
                @endif
            </div>
            <div class="action_links">
                <div class="row g-0 display-flex justify-content-center removewrapper{{ $product->id }}">
                    <div class="col-2">
                        <button onclick="increment({{ $product->id }})" type="button" class="btn btn-outline btn-dark"
                            style="border-radius: 18px" title="add to cart"><i class="fa fa-plus"></i> </button>
                    </div>
                    <div class="col-3">
                        <input onchange="updateQuantity({{ $product->id }}, {{ Auth::user()->id }} )"
                            class="form-control" name="input{{ $product->id }}"
                            value="{{ $product->cartQuantity(Auth::user()) }}" type="number">
                    </div>
                    <div class="col-2">
                        <button onclick="decrement({{ $product->id }})" type="button"
                            class="btn btn-outline btn-dark" style="border-radius: 18px" title="add to cart"><i
                                class="fa fa-minus"></i></button>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-outline btn-dark remove{{ $product->id }}"
                            style="border-radius: 18px" title="add to cart"><i class="fa fa-close"></i></button>
                    </div>
                </div>
                <ul class="addwrapper{{ $product->id }}">
                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o"
                                aria-hidden="true"></i></a></li>
                    <li class="add_to_cart">
                        <button type="button" class="btn btn-outline btn-dark add{{ $product->id }}"
                            style="border-radius: 18px" title="add to cart"><i class="fa fa-shopping-cart"></i> add to
                            cart</button>
                    </li>
                    <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                </ul>
            </div>
        </div>
        <script>
            $('.removewrapper{{ $product->id }}').hide();

            $('document').ready(function() {

                var requestData = {
                    userId: {{ Auth()->user()->id }},
                    productId: {{ $product->id }},
                    _token: "{{ csrf_token() }}",
                };



                $('.add{{ $product->id }}').click(function(e) {
                    console.log("i clicked");

                    // e.preventDefault();
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/cart',
                        method: 'POST',
                        data: requestData,
                        dataType: 'json',
                        headers: {
                            'ContentType': 'application/json',
                            'accept': 'application/json'
                        },
                        success: function(data) {
                            console.log("data is ==> ", data);

                            if (data.status == 'success') {
                                $('.addwrapper{{ $product->id }}').hide();
                                $('.removewrapper{{ $product->id }}').show();
                            }
                        },
                        error: function(error) {
                            console.log("error is ==> ", error);
                        }
                    });
                });


                $('.remove{{ $product->id }}').click(function(e) {

                    // e.preventDefault();
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/cart',
                        method: 'Delete',
                        data: requestData,
                        dataType: 'json',
                        headers: {
                            'ContentType': 'application/json',
                            'accept': 'application/json',
                        },
                        success: function(data) {
                            console.log(data);

                            if (data.status == 'success') {
                                $('.addwrapper{{ $product->id }}').show();
                                $('.removewrapper{{ $product->id }}').hide();
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });

            });
        </script>
    </div>
@else
    <div class="single_product">
        <div class="product_thumb">
            <div class="d-flex justify-content-center mb-2 mt-2">
                <a href="{{ route('product-details', $product) }}"><img src="/products/{{ $product->image }}"
                        alt="" style="height: 200px;"></a>
            </div>
            <div class="label_product">
                <span class="label_sale">sale</span>
            </div>
        </div>
        <div class="product_content grid_content">
            <div class="product_name">
                <h3><a href="{{ route('product-details', $product) }}">{{ Str::limit($product->name, 25) }}</a>
                </h3>
            </div>
            <div class="price_box">
                @if ($product->discount)
                    <span
                        class="current_price">₦{{ number_format($product->price - ($product->discount * $product->price) / 100) }}</span>
                    <span class="old_price">₦{{ number_format($product->price) }}</span>
                @else
                    <span class="current_price">₦{{ number_format($product->price) }}</span>
                @endif
            </div>
            <div class="action_links">
                <ul class="">               
                        <li class="add_to_cart">
                            <form action="{{ route('add-wishes', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-dark" style="border-radius: 18px"
                                    title="add to cart"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                            </form>
                        </li>

                        <li class="add_to_cart">
                            <form action="{{ route('add-cart', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline btn-dark" style="border-radius: 18px"
                                    title="add to cart"><i class="fa fa-shopping-cart"></i> add to
                                    cart</button>
                            </form>
                        </li>
                </ul>
            </div>
        </div>

    </div>
@endif


{{-- <div class="single_product">
    <div class="product_thumb">
        <div class="d-flex justify-content-center mb-2 mt-2">
            <a href="{{ route('product-details', $product) }}"><img src="/products/{{ $product->image }}" alt=""
                    style="height: 200px;"></a>
        </div>
        <div class="label_product">
            <span class="label_sale">sale</span>
        </div>
    </div>
    <div class="product_content grid_content">
        <div class="product_name">
            <h3><a href="{{ route('product-details', $product) }}">{{ Str::limit($product->name, 25) }}</a>
            </h3>
        </div>
        <div class="price_box">
            @if ($product->discount)
                <span
                    class="current_price">₦{{ number_format($product->price - ($product->discount * $product->price) / 100) }}</span>
                <span class="old_price">₦{{ number_format($product->price) }}</span>
            @else
                <span class="current_price">₦{{ number_format($product->price) }}</span>
            @endif
        </div>
        <div class="action_links">
            <ul class="">
                @if ($product->hasWish(Auth::user()))
                    <li class="add_to_cart">
                        <form action="{{ route('delete-wishes', $product) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline btn-danger" style="border-radius: 18px"
                                title="add to cart"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                        </form>
                    </li>
                @else
                    <li class="add_to_cart">
                        <form action="{{ route('add-wishes', $product) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark" style="border-radius: 18px"
                                title="add to cart"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                        </form>
                    </li>
                @endif
                @if ($product->hasCart(Auth::user()))
                    <li class="add_to_cart">
                        <form action="{{ route('delete-cart', $product) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline btn-dark" style="border-radius: 18px"
                                title="add to cart"><i class="fa fa-shopping-cart"></i> remove from
                                cart</button>
                        </form>
                    </li>
                @else
                    <li class="add_to_cart">
                        <form action="{{ route('add-cart', $product) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-dark" style="border-radius: 18px"
                                title="add to cart"><i class="fa fa-shopping-cart"></i> add to
                                cart</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>

</div> --}}
