@extends('frontend.master')
@section('title')
    checkout-3
@endsection
@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('/')}}'assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout3<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Payment </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout3</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <form action="{{route('checkout3.store')}}" method="post">
                        @csrf

                        <div class="accordion-summary" id="accordion-payment">


                            <div class="card">
                                <div class="card-header" id="heading-3">
                                    <h2 class="card-title">
                                        <input type="radio" id="customRadio" name="payment_method"  value="cod" s="custom-control-label"> <i class="icon-dollar"></i>Cash on delivery
                                    </h2>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="heading-3">
                                    <h2 class="card-title">
                                        <input type="radio" id="customRadio" name="payment_method"  value="paypal" s="custom-control-label"><i class=" pl-2 icon-paypal"></i> Pay with Paypal
                                    </h2>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="heading-3">
                                    <h2 class="card-title">
                                        <input type="radio" id="customRadio" name="payment_method"  value="razor" s="custom-control-label"><i class=" pl-2 icon-rupee"></i> Pay with Razor
                                    </h2>
                                </div>
                            </div>

                        </div><!-- End .accordion -->

                        <button type="submit" class="btn btn-block btn-outline-secondary">Continue</button>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


