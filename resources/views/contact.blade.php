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
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
     <!--contact map start-->
    {{-- <div class="contact_map mt-60">
       <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="map-area">
                      <div id="googleMap"></div>
                   </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--contact map end-->
    
    <!--contact area start-->
    <div class="contact_area mt-5">
        <div class="container mt-5">   
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>contact us</h3>    
                         <p>Get in touch with us at Drinks! Whether you have a question about our products, need assistance with an order, or just want to share your feedback, we're here to help. Our dedicated team is committed to providing you with prompt and personalized assistance, ensuring your experience with us is nothing short of exceptional. Reach out to us today—we can't wait to hear from you!</p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : No 40 Baria Sreet 133/2 NewYork City</li>
                            <li><i class="fa fa-phone"></i> <a href="#">Infor@roadthemes.com</a></li>
                            <li><i class="fa fa-envelope-o"></i> 0(1234) 567 890</li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Tell us your project</h3>   
                        <form  action="{{ route('contact') }}" method="POST">
                            @csrf
                            <p>  
                               <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" value="{{ old('name') }}" type="text">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </p>
                            <p>       
                               <label>  Your Email (required)</label>
                                <input name="email" placeholder="Email *" value="{{ old('email') }}" type="email">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </p>
                            <p>          
                               <label>  Subject</label>
                                <input name="subject" placeholder="Subject *"  value="{{ old('subject') }}" type="text">
                                @error('subject')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </p>    
                            <div class="contact_textarea mb-3">
                                <label>  Your Message</label>
                                <textarea placeholder="Message *" name="message"  class="form-control2" ></textarea>     
                                @error('message')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>   
                            <button type="submit"> Send</button>  
                        </form> 

                    </div> 
                </div>
            </div>
        </div>    
    </div>

    <!--contact area end-->
@endsection
