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
                                <div class="tab-pane fade show active" id="dashboard">
                                    <h3>Dashboard </h3>
                                    <p>From your account dashboard. you can easily check &amp; view your <a
                                            href="#">recent orders</a>, manage your <a href="#">shipping and
                                            billing addresses</a> and <a href="#">Edit your password and account
                                            details.</a></p>

                                    <h3>Account details </h3>

                                    <div>
                                        <div class="row mt-3 mb-3">
                                            <div class="col-12 col-lg-6 mb-4">
                                                <div class="border" style="height: 100%">
                                                    <div class="d-flex justify-content-between border-bottom p-2">
                                                        <h5><b>Account Details</b></h5>
                                                        <a href="{{ route('edit-profile') }}"><button class="btn btn-outline-danger btn-sm"><i
                                                                    class="fa fa-pencil"></i></button></a>
                                                    </div>

                                                    <div class="p-2">
                                                        <h5>{{ Auth::user()->fullname }}</h5>
                                                        <p>{{ Auth::user()->email }}</p>
                                                        <p> - verified</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6 mb-4">
                                                <div class="border " style="height: 100%">
                                                    <div class="d-flex justify-content-between border-bottom p-2">
                                                        <h5><b>Shipping Address</b></h5>
                                                        <a href="{{ route('profile-address') }}"><button class="btn btn-outline-danger btn-sm"><i
                                                                    class="fa fa-pencil"></i></button></a>
                                                    </div>

                                                    <div class="p-2">
                                                        <div class="mb-2">
                                                            <h5>Default Shipping Address:</h5>
                                                        </div>
                                                        <div>
                                                            <h6>Mama Mudiaga Street, Along Usieffrun Road, Orhuwhorun
                                                                Udu-Usiefrun, Delta</h6>
                                                            <h6>+234 8131658436</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6 mb-4">
                                                <div class="border " style="height: 100%">
                                                    <div class="d-flex justify-content-between border-bottom p-2">
                                                        <h5><b>Delivery Type</b></h5>
                                                        <a href="{{ route('delivery-type') }}"><button class="btn btn-outline-danger btn-sm"><i
                                                                    class="fa fa-pencil"></i></button></a>
                                                    </div>

                                                    <div class="p-2">
                                                        <div class="mb-3">
                                                            <h5>Default Delivery Type:</h5>
                                                        </div>
                                                        <div>
                                                            <h6>Pick Up Station</h6>
                                                            <h6>Delivery fee start from ₦760</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="#">
                                                <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                <div class="input-radio">
                                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                </div> <br>
                                                <label>First Name</label>
                                                <input type="text" name="first-name">
                                                <label>Last Name</label>
                                                <input type="text" name="last-name">
                                                <label>Email</label>
                                                <input type="text" name="email-name">
                                                <label>Password</label>
                                                <input type="password" name="user-password">
                                                <label>Birthdate</label>
                                                <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                                                <span class="example">
                                                  (E.g.: 05/31/1970)
                                                </span>
                                                <br>
                                                <span class="custom_checkbox">
                                                    <input type="checkbox" value="1" name="optin">
                                                    <label>Receive offers from our partners</label>
                                                </span>
                                                <br>
                                                <span class="custom_checkbox">
                                                    <input type="checkbox" value="1" name="newsletter">
                                                    <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                </span>
                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit">Save</button>
                                                </div>
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
        </section>
        <!-- my account end -->
    @endsection
