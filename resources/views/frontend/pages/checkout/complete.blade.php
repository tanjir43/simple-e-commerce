@extends('frontend.master')
@section('title')
    checkout-1
@endsection
@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('/')}}'assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Complete</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="row">
            <div class="container">
                <div class="col-lg-12 text-center" >
                    <p>Thank you for your order !</p>
                    <p>Your order id is <a href="" class="text-danger">
                       <strong>{{$order}}</strong> </a></p>
                </div>
            </div>
        </div>

    </main><!-- End .main -->
@endsection
