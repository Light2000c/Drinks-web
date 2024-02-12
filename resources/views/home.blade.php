    @extends('layouts.app')


    @section('content')
 <!--slider area start-->
 <section class="slider_section mt-30">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-9 col-md-12">
                <div class="slider_area slider_seven owl-carousel">
                        <div class="single_slider" data-bgimg="/images/background-1.jpeg">
                        <div class="slider_content slider_content_seven style_1">
                            <h1>  <span>products </span> Gear VR3D </h1>
                            <span>Virtual reality though </span>
                            <h2><span>From </span> $99 <span>00 </span></h2>
                            <a href="shop.html">shop now</a>
                        </div>
                    </div>
                    <div class="single_slider d-flex align-items-center" data-bgimg="/images/background-2.jpeg">
                        <div class="slider_content slider_content_seven style_2">
                            <span>Sport & Outdoor</span>
                            <h1>Full HD 23-inch </h1>
                            <h2>3D LED TV </h2>
                            <a href="shop.html">shop now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="deals_sidebar_product deals_s_p_seven">
                    <div class="section_title section_title_two">
                        <h2>Hot deals</h2>
                    </div>
                    @php
                        $displayType = "deals";
                    @endphp
                    <div class="deals_product_column1 owl-carousel">
                        @foreach($hotDeals as $hot)
                        <x-product-component2 :product="$hot" :displayTyp="$hot" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
</section>
<!--slider area end-->



<!--home product area start-->
<section class="home_product_area product_color_seven mb-50 mt-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_tab_button tab_button_seven">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-bs-toggle="tab" href="#Products7" role="tab" aria-controls="Products7" aria-selected="true"> 
                                New Products
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#featured7" role="tab" aria-controls="featured7" aria-selected="false">
                                featured products
                            </a>
                        </li>
                    </ul>
                </div>
            </div> 
        </div>       
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Products7" role="tabpanel">
                <div class="row">
                    <div class="product_carousel product_style7 product_column4 owl-carousel">
                        @foreach($new as $hot)
                        <div class="col-lg-3">
                            <x-product-component2 :product="$hot"  />
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="featured7" role="tabpanel">
                <div class="row">
                    <div class="product_carousel product_style7 product_column4 owl-carousel">
                        @foreach($featured as $hot)
                        <div class="col-lg-3">
                            <x-product-component2 :product="$hot"  />
                        </div>
                        @endforeach
                    </div>
                   

                </div> 
                </div>   
            </div>  
        </div> 
    </div>
</section>
<!--home product area end-->

<!--home product area start-->
<section class="home_product_area product_color_seven mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
               <div class="product_header">
                    <div class="section_title section_title_seven">
                        <h2>Top Products</h2>
                    </div>
                     <div class="product_tab_button button_color">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#Washing" role="tab" aria-controls="Washing" aria-selected="true"> 
                                    Wine
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#Laundry" role="tab" aria-controls="Laundry" aria-selected="false">
                                    Champagn
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#Cooking" role="tab" aria-controls="Cooking" aria-selected="false">
                                    Tequila
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
             </div>
        </div>
        <div class="row home_product_reverse">
            {{-- <div class="col-lg-3 col-md-12">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="/web/assets/img/bg/banner12.jpg" alt=""></a>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12 col-md-12 p-0">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Washing" role="tabpanel">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                            @foreach($wine as $wine)
                            <div class="col-lg-3">
                                <x-product-component2 :product="$wine"  />
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="tab-pane fade" id="Laundry" role="tabpanel">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                            @foreach($champagne as $pagne)
                            <div class="col-lg-3">
                                <x-product-component2 :product="$pagne"  />
                            </div>
                            @endforeach

                        </div>    
                    </div>

                    <div class="tab-pane fade" id="Cooking" role="tabpanel">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                            @foreach($tequila as $teq)
                            <div class="col-lg-3">
                                <x-product-component2 :product="$teq"  />
                            </div>
                            @endforeach

                        </div>    
                    </div> 
 
                </div> 
            </div>
        </div>            
    </div>
</section>
<!--home product area end-->

 <!--home product area start-->
<section class="home_product_area product_color_seven mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
               <div class="product_header">
                    <div class="section_title section_title_seven">
                        <h2>More Products</h2>
                    </div>
                     <div class="product_tab_button button_color">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#Camera7" role="tab" aria-controls="Camera7" aria-selected="true"> 
                                    Whisky
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#Lenses7" role="tab" aria-controls="Lenses7" aria-selected="false">
                                    Cognac
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#Digital7" role="tab" aria-controls="Digital7" aria-selected="false">
                                    Gin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
             </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 p-0">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Camera7" role="tabpanel">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                            @foreach($whisky as $whisky)
                            <div class="col-lg-3">
                                <x-product-component2 :product="$whisky"  />
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="tab-pane fade" id="Lenses7" role="tabpanel">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                            @foreach($cognac as $cog)
                            <div class="col-lg-3">
                                <x-product-component2 :product="$cog"  />
                            </div>
                            @endforeach

                        </div>    
                    </div>

                    <div class="tab-pane fade" id="Digital7" role="tabpanel">
                        <div class="product_carousel product_style7 product_column4 owl-carousel">
                            @foreach($gin as $gin)
                            <div class="col-lg-3">
                                <x-product-component2 :product="$gin"  />
                            </div>
                            @endforeach

                        </div>    
                    </div>  
                </div> 
            </div>
            {{-- <div class="col-lg-3 col-md-12">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="/web/assets/img/bg/banner12.jpg" alt=""></a>
                    </div>
                </div>
            </div> --}}
        </div>            
    </div>
</section>

 

    @endsection
    
    
   