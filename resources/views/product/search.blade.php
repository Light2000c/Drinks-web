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
                            <li>Search Result</li>
                            <li>{{ $keyword }}</li>
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

                <div class="col-lg-12 col-md-12">
           
                    <div class="shop_title">
                        <h1>Search</h1>
                    </div>
            

                    @if ($searchResults->count())
                        <div class="row no-gutters shop_wrapper">

                            @foreach ($searchResults as $product)
                                <div class="col-lg-4 col-md-4 col-12 ">
                                    <x-product-component :product="$product" />
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-primary" role="alert">
                            Your search "{{ $keyword }}" didn't return any result.
                        </div>
                    @endif

                    <div class="shop_toolbar t_bottom">
                        @if($searchResults->count())
                        {{ $searchResults->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    

    <script>
        var userId = {{ Auth::user() ? Auth::user()->id : '' }};
        var products = @json($searchResults);

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
