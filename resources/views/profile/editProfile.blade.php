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

                                    <div class="tab-pane fade show active mb-5" id="dashboard">
                                        <h3>Edit Profile</h3>
                                    </div>

                                    <div>
                                        <div class="border mb-5">

                                            <form action="{{ route('edit-profile') }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group m-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="fullname" class="form-control"
                                                            id="floatingInput" value="{{ Auth::user()->fullname ?? '' }}"
                                                            placeholder="Full Name">
                                                        <label for="fullname">Full Name</label>
                                                        @error('fullname')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group m-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="email" class="form-control"
                                                            id="floatingInput" value="{{ Auth::user()->email ?? '' }}"
                                                            placeholder="Full Name">
                                                        <label for="email">Email</label>
                                                        @error('email')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="d-grid m-3">
                                                    <button type="submit" class="btn btn-outline-danger">Save
                                                        Changes</button>
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
