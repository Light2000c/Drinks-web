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

                                    <div class="tab-pane fade show active mb-5 d-flex justify-content-between"
                                        id="dashboard">
                                        <h3>Addresses</h3>
                                        <a href="{{ route('profile-add-address') }}"><button
                                                class="btn btn-danger btn-sm">ADD NEW ADDRESS</button></a>
                                    </div>

                                    <div class="row mt-3 mb-3">

                                        @foreach ($addresses as $address)
                                            @if ($address->count())
                                                <div class="col-12 col-lg-6 mb-4">
                                                    <div class="border" style="height: 100%">
                                                        <div class="p-2 mt-2 mb-2">
                                                            <div class="mb-2">
                                                                <h5>{{ $address->fullname }}</h5>
                                                            </div>
                                                            <div>
                                                                <h6>{{ $address->delivery_address }}</h6>
                                                                <h6>{{ $address->phone }}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-top p-2">
                                                            <form action="{{ route('profile-update-address', $address) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <button type="submit"
                                                                    class="btn btn-outline-primary btn-sm"
                                                                    @if ($address->default == 1) disabled @endif>SET AS
                                                                    DEFAULT</button>
                                                            </form>
                                                            <div class="d-flex">
                                                                <div>
                                                                    <a href="{{ route('profile-edit-address', $address) }}"
                                                                        class="me-2"><button
                                                                            class="btn btn-outline-danger btn-sm"><i
                                                                                class="fa fa-pencil"></i></button></a>
                                                                </div>
                                                                <div>
                                                                    <form
                                                                        action="{{ route('profile-delete-address', $address) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href=""><button type="submit"
                                                                                class="btn btn-outline-danger btn-sm"><i
                                                                                    class="fa fa-trash"></i></button></a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="alert alert-info" role="alert">
                                                    You currently don't have any address <a href="#"
                                                        class="alert-link">Add address now</a>.
                                                </div>
                                            @endif
                                        @endforeach


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
