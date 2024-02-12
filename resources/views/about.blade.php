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
                            <li>about us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!--about section area -->
    <div class="about_section mt-60">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 col-md-12">
                    <div class="about_thumb">
                        <img src="/images/abt-5.avif" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about_content">
                        <h1>Welcome To Drinks!</h1>
                        <p>Welcome to Drinks, your ultimate destination for both alcoholic and non-alcoholic wines! Explore our curated selection of exquisite options, from rich reds to crisp whites, catering to every palate. Whether you're celebrating or simply unwinding, find your perfect bottle with us. Convenient online ordering and swift delivery make indulging in fine wines effortless. Elevate your wine experience with Drinks today!</p>
                        <div class="view__work">
                            <a href="{{ route('shop') }}">Visit Our Shop</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5 mt-5">
                <div class="col-lg-6 col-md-12">
                    <div class="about_content">
                        <h2>Mission</h2>
                        <p>At Drinks, our mission is to offer a diverse selection of alcoholic and non-alcoholic wines, providing an exceptional shopping experience through convenient online ordering and prompt delivery. We aim to make the enjoyment of fine wines accessible to all, fostering a culture of celebration and appreciation.!</p>
                    </div>
                    <div class="about_content">
                        <h2>Vision</h2>
                        <p>Our vision at Drinks is to be the premier destination for wine enthusiasts, known for our exceptional quality, variety, and commitment to customer satisfaction. We aspire to continuously innovate, champion sustainability, and share the joys of wine with the world.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about_thumb">
                        <img src="/images/abt-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end-->


    <!--counterup area -->
    <div class="counterup_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup">
                        <div class="counter_img">
                            <img src="assets/img/about/count.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">2170</h2>
                            <p>happy customers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup count-two">
                        <div class="counter_img">
                            <img src="assets/img/about/count2.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">8080</h2>
                            <p>AWARDS won</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup">
                        <div class="counter_img">
                            <img src="assets/img/about/count3.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">2150</h2>
                            <p>HOURS WORKED</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_counterup count-two">
                        <div class="counter_img">
                            <img src="assets/img/about/count4.png" alt="">
                        </div>
                        <div class="counter_info">
                            <h2 class="counter_number">2170</h2>
                            <p>COMPLETE PROJECTS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--counterup end-->
@endsection
