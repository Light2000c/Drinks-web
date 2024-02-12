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
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="{{ route('account') }}" class="nav-link">Dashboard</a></li>
                                <li><a href="{{ route('profile-order') }}" class="nav-link">Order</a></li>
                                <li><a href="{{ route('profile-wishlist') }}" class="nav-link active">Saved Items</a></li>
                                <li><a href="{{ route('profile-address') }}" class="nav-link">Addresses</a></li>
                                <li><a href="" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active mb-5" id="dashboard">
                                <h3>Wishlist</h3>
                            </div>


                            <div class="tab-pane fade show active" id="orders">
                                <div class="cart-mobile mb-5">
                                    @foreach ($wishes as $wish)
                                        <div class="row border mb-3 m-2 p-2 pb-2 ">
                                            <div class="col-3 border">
                                                <div class="d-flex justify-content-center pt-1 pb-1">
                                                    <a href="{{ route('product-details', $wish->product) }}"><img
                                                            class="img-fluid" src="/products/{{ $wish->product->image }}"
                                                            alt="" style="height: 100px"></a>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <h5><a
                                                        href="{{ route('product-details', $wish->product) }}">{{ $wish->product->name }}</a>
                                                </h5>
                                                <p>₦{{ number_format($wish->product->price) }}</p>
                                            </div>
                                            <div class="col-2">
                                                <form action="{{ route('delete-wishes', $wish->product) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-primary"><i
                                                            class="fa fa-trash"></i></button>
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
                                                            <th class="product_remove">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($wishes as $wish)
                                                            <tr>
                                                                <td class="product_thumb"><a href=""><img
                                                                            class="img-fluid"
                                                                            src="/products/{{ $wish->product->image }}"
                                                                            alt="" style="height: 100px"></a></td>
                                                                <td class="product_name"><a
                                                                        href="">{{ $wish->product->name }}</a>
                                                                </td>
                                                                <td class="product-price">
                                                                    ₦{{ number_format($wish->product->price) }}
                                                                </td>
                                                                <td class="product_remove">
                                                                    <form type="submit"
                                                                        action="{{ route('delete-wishes', $wish->product) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-outline-primary btn-sm"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="m-3">
                                                {{ $wishes->links('pagination::bootstrap-5') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account end -->
@endsection
