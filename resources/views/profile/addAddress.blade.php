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
                                <li><a href="{{ route('profile-wishlist') }}" class="nav-link">Wishlist</a></li>
                                <li><a href="{{ route('profile-address') }}" class="nav-link active">Addresses</a></li>
                                <li><a href="{{ route('profile-order') }}" class="nav-link">Order</a></li>
                                <li><a href="" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="address">
                                <div>
                                    <div class="tab-pane fade show active mb-5 border-bottom" id="dashboard">
                                        <h4><a href="" class="me-2 text-dark"><i class="fa fa-arrow-left"></i></a>
                                            Add Address</h4>
                                    </div>

                                    <form action="{{ route('profile-add-address') }}" method="post">
                                        @csrf
                                        <x-address-form />
                                        {{-- <div class="">
                                            <div class="form-group border p-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="fullname" class="form-control"
                                                                id="floatingInput" placeholder="Full Name">
                                                            <label for="fullname">Full Name</label>
                                                            @error('fullname')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input type="tel" name="phone" class="form-control"
                                                                id="floatingInput" placeholder="Phone No">
                                                            <label for="fullname">Phone</label>
                                                            @error('phone')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="delivery_address" class="form-control"
                                                            id="floatingInput" placeholder="Delivery Address">
                                                        <label for="delivery_address">Delivery Address</label>
                                                        @error('delivery_address')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="additional_information" class="form-control"
                                                            id="floatingInput" placeholder="Additional Information">
                                                        <label for="additional_infromation">Additional Address (Optional)</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="region" class="form-control"
                                                                id="floatingInput" placeholder="Region">
                                                            <label for="region">Region</label>
                                                            @error('region')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="city" class="form-control"
                                                                id="floatingInput" placeholder="City">
                                                            <label for="city">City</label>
                                                            @error('city')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary"> Save Address</button>
                                                </div>
                                            </div>

                                        </div> --}}
                                    </form>

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
