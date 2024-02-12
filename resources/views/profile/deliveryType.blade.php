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
                                <li><a href="{{ route('account') }}" class="nav-link active">Dashboard</a></li>
                                <li><a href="{{ route('profile-order') }}" class="nav-link">Order</a></li>
                                <li><a href="{{ route('profile-wishlist') }}" class="nav-link">Saved Items</a></li>
                                <li><a href="{{ route('profile-address') }}" class="nav-link">Addresses</a></li>
                                <li><a href="" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="address">
                                <div>

                                    <div class="tab-pane fade show active mb-5"
                                        id="dashboard">
                                        <h3>Delivery Type</h3>
                                    </div>

                                    <div>
                                        <div class="border mb-5">
                                            <div class="border-bottom p-3">
                                                <div class="d-flex justify-content-between">
                                                    <h4>DELIEVERY DETAILS</h4>
                
                                                </div>
                                            </div>

                                            <form action="{{ route('delivery-type') }}" method="post">
                                                @csrf
                                                @method('put')

                                            <div class="p-3">
                                                <div class="mb-4">
                                                    <span class="me-2">
                                                        <input type="radio" name="delivery_type" value="0" id="" @if(Auth::user()->delivery_type == '0') checked @endif>
                                                    </span>
                                                    <span>Pick Up Station</span>
                                                    <p>Delivery between 6 - 10 days to deliver</p>
                                                </div>
                
                                                <div class=""> 
                                                    <div class="border p-3">
                                                        <h6>Switch to a pickup station starting from ₦760</h6>
                                                        <h6>Delivery between 6 - 10 days to deliver</h6>
                                                    </div>
                                                    <div>
                
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="p-3">
                                                <div class="mb-4">
                                                    <span class="me-2">
                                                        <input type="radio" name="delivery_type" value="1" id="" @if(Auth::user()->delivery_type == '1') checked @endif>
                                                    </span>
                                                    <span>Door Delivery</span>
                                                    <p>Delivery between 8 - 12 days to deliver</p>
                                                </div>
                
                                                <div class=""> 
                                                    <div class="border p-3">
                                                        <h6>Switch to a pickup station starting from ₦1,200</h6>
                                                        <h6>Delivery between 8 - 12 days to deliver</h6>
                                                    </div>
                                                    <div>
                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-grid m-3">
                                                <button type="submit" class="btn btn-outline-danger">Save Changes</button>
                                            </div>

                                        </form>
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
