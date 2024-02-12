@if($displayType == "deals")
<div class="deals_product_list">
    <div class="product_thumb">
        <a href="{{ route('product-details', $product) }}"><img src="/products/{{ $product->image }}" alt="" style="height: 200;"></a>
        <div class="label_product">
            <span class="label_sale">sale</span>
        </div>
        {{-- <div class="quick_button">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
        </div> --}}
    </div>
    <div class="product_content">
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
        {{-- <div class="product_timing_seven">
            <div data-countdown="2030/12/15"></div>
        </div> --}}
    </div>
</div>
@else
<div class="single_product">
    <div class="product_thumb">
        <a href="{{ route('product-details', $product) }}"><img src="/products/{{ $product->image }}" alt="" style="height: 200;"></a>
        <div class="label_product">
            <span class="label_sale">sale</span>
        </div>
        {{-- <div class="quick_button">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
        </div> --}}
    </div>
    <div class="product_content">
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
                <span class="current_price" >₦{{ number_format($product->price) }}</span>
            @endif
        </div>
        {{-- <div class="product_timing_seven">
            <div data-countdown="2030/12/15"></div>
        </div> --}}
    </div>
</div>
@endif