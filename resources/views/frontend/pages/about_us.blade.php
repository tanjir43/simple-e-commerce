@extends('frontend.master')

@section('title')
    about_us
@endsection


@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">About us<span>Pages</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About us</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->


        <div class="page-content pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-text text-center mt-3">
                            <h2 class="title text-center mb-2">{{$about->heading}}</h2><!-- End .title text-center mb-2 -->
                            <p>{{$about->content}}</p>
                            <img src="{{$about->signature}}" alt="signature" class="mx-auto mb-5">

                            <img src="{{$about->bg_image}}" alt="image" class="mx-auto mb-6">
                        </div><!-- End .about-text -->
                    </div><!-- End .col-lg-10 offset-1 -->
                </div><!-- End .row -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-puzzle-piece"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Design Quality</h3><!-- End .icon-box-title -->
                                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero <br>eu augue.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Professional Support</h3><!-- End .icon-box-title -->
                                <p>Praesent dapibus, neque id cursus faucibus, <br>tortor neque egestas augue, eu vulputate <br>magna eros eu erat. </p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-heart-o"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Made With Love</h3><!-- End .icon-box-title -->
                                <p>Pellentesque a diam sit amet mi ullamcorper <br>vehicula. Nullam quis massa sit amet <br>nibh viverra malesuada.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-2"></div><!-- End .mb-2 -->

            <div class="bg-image pt-7 pb-5 pt-md-12 pb-md-9" style="background-image: url(assets/images/backgrounds/bg-4.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="40" data-speed="3000" data-refresh-interval="50">{{$about->happy_customer}}</span>k+
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Happy Customer</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="20" data-speed="3000" data-refresh-interval="50">{{$about->experience}}</span>+
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Years in Business</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="95" data-speed="3000" data-refresh-interval="50">{{$about->return_clients}}</span>%
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Return Clients</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                    <span class="count" data-from="0" data-to="15" data-speed="3000" data-refresh-interval="50">{{$about->awards}}</span>
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">Awards Won</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-image pt-8 pb-8 -->

            <div class="bg-light-2 pt-6 pb-7 mb-6">
                <div class="container">
                    <h2 class="title text-center mb-4">Meet Our Team</h2><!-- End .title text-center mb-2 -->

                    <div class="row">
                        @foreach(\App\Models\AboutUs::all() as $about)
                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="{{$about->photo}}" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">Samanta Grey<span>{{$about->designation}}</span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->
                        @endforeach

                    </div><!-- End .row -->


                    <div class="text-center mt-3">
                        <a href="blog.html" class="btn btn-sm btn-minwidth-lg btn-outline-primary-2">
                            <span>LETS START WORK</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .text-center -->
                </div><!-- End .container -->
            </div><!-- End .bg-light-2 pt-6 pb-6 -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="brands-text text-center mx-auto mb-6">
                            <h2 class="title">The world's premium design brands in one destination.</h2><!-- End .title -->
                            <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nis</p>
                        </div><!-- End .brands-text -->

                        <div class="brands-display">
                            <div class="row justify-content-center">
                                @foreach(\App\Models\Brand::where('status','active')->get() as $brand)
                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="{{asset($brand->photo)}}" alt="Brand Name">
                                    </a>
                                </div><!-- End .col-md-3 -->
                                @endforeach



                            </div><!-- End .row -->
                        </div><!-- End .brands-display -->
                    </div><!-- End .col-lg-10 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@endsection


@section('scripts')


@endsection
