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
                    <li class="breadcrumb-item active" aria-current="page">Checkout1</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="text" class="form-control" required id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="{{route('checkout1.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @php
                        $name = explode(' ',auth()->user()->full_name);
                        @endphp
                        <div class="row">

                            <div class="col-lg-12">

                                <h2 class="checkout-title">Billing Details</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$name[0]}}" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$name[1]}}" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Country *</label>
                                <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}" required>

                                <label>Street address *</label>
                                <input type="text" class="form-control" id="address" placeholder="House number and Street name" name="address" value="{{$user->address}}" required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}"  required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label> State *</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{$user->state}}" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" id="postcode" name="postcode" value="{{$user->postcode}}" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control"value="{{$user->phone}}" id="phone" name="phone" required>
                                    </div><!-- End .col-sm-6 -->
                                </div>

                                <label>Email address *</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly required>


                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" id="note" rows="4" name="note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>

                                <div>
                                    <input type="checkbox" id="customCheck1">
                                    <span class="text-info ml-3"> Ship to same address ! </span>
                                </div>


                                <h2 class="checkout-title">Shipping Details</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" id="sfirst_name" name="sfirst_name" value="{{$name[0]}}" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" id="slast_name" name="slast_name" value="{{$name[1]}}" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Country *</label>
                                <input type="text" class="form-control" name="scountry" id="scountry" value="{{$user->scountry}}" required>


                                <label>Street address *</label>
                                <input type="text" class="form-control" id="saddress" placeholder="House number and Street  name" name="saddress" value="{{$user->saddress}}" required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" id="scity" name="scity" value="{{$user->scity}}"  required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State *</label>
                                        <input type="text" class="form-control" id="sstate" name="sstate" value="{{$user->sstate}}" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" id="spostcode" name="spostcode" value="{{$user->spostcode}}" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" id="sphone" name="sphone" value="{{$user->sphone}}" required>
                                    </div><!-- End .col-sm-6 -->
                                </div>

                                <label>Email address *</label>
                                <input type="email" class="form-control" id="semail" name="semail" value="{{$user->email}}"  required>
                                <input type="hidden" name="sub_total" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}">
                                <input type="hidden" name="total_amount" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}">
                            </div>

                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                <span class="btn-text">Place Order</span>
                                <span class="btn-hover-text">Proceed to Checkout</span>
                            </button>



                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('scripts')
    <script>
        $('#customCheck1').on('change',function (e) {
            e.preventDefault();
            if(this.checked){
                $('#sfirst_name').val($('#first_name').val());
                $('#slast_name').val($('#last_name').val());
                $('#semail').val($('#email').val());
                $('#scountry').val($('#country').val());
                $('#scity').val($('#city').val());
                $('#spostcode').val($('#postcode').val());
                $('#sstate').val($('#state').val());
                $('#saddress').val($('#address').val());
                $('#sphone').val($('#phone').val());
            }else{
                $('#sphone').val("");
                $('#sfirst_name').val("");
                $('#slast_name').val("");
                $('#semail').val("");
                $('#scountry').val("");
                $('#scity').val("");
                $('#spostcode').val("");
                $('#sstate').val("");
                $('#saddress').val("");

            }
        })
    </script>
@endsection



{{--<aside class="col-lg-3">--}}
{{--    <div class="summary">--}}
{{--        <h3 class="summary-title">Your Order</h3>--}}

{{--        <table class="table table-summary">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Product</th>--}}
{{--                <th>Total</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}

{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td><a href="#">Beige knitted elastic runner shoes</a></td>--}}
{{--                <td>$84.00</td>--}}
{{--            </tr>--}}

{{--            <tr>--}}
{{--                <td><a href="#">Blue utility pinafore denimdress</a></td>--}}
{{--                <td>$76,00</td>--}}
{{--            </tr>--}}
{{--            <tr class="summary-subtotal">--}}
{{--                <td>Subtotal:</td>--}}
{{--                <td>$160.00</td>--}}
{{--            </tr><!-- End .summary-subtotal -->--}}
{{--            <tr>--}}
{{--                <td>Shipping:</td>--}}
{{--                <td>Free shipping</td>--}}
{{--            </tr>--}}
{{--            <tr class="summary-total">--}}
{{--                <td>Total:</td>--}}
{{--                <td>$160.00</td>--}}
{{--            </tr><!-- End .summary-total -->--}}
{{--            </tbody>--}}
{{--        </table><!-- End .table table-summary -->--}}

{{--        <div class="accordion-summary" id="accordion-payment">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header" id="heading-1">--}}
{{--                    <h2 class="card-title">--}}
{{--                        <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">--}}
{{--                            Direct bank transfer--}}
{{--                        </a>--}}
{{--                    </h2>--}}
{{--                </div><!-- End .card-header -->--}}
{{--                <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">--}}
{{--                    <div class="card-body">--}}
{{--                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.--}}
{{--                    </div><!-- End .card-body -->--}}
{{--                </div><!-- End .collapse -->--}}
{{--            </div><!-- End .card -->--}}

{{--            <div class="card">--}}
{{--                <div class="card-header" id="heading-2">--}}
{{--                    <h2 class="card-title">--}}
{{--                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">--}}
{{--                            Check payments--}}
{{--                        </a>--}}
{{--                    </h2>--}}
{{--                </div><!-- End .card-header -->--}}
{{--                <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">--}}
{{--                    <div class="card-body">--}}
{{--                        Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.--}}
{{--                    </div><!-- End .card-body -->--}}
{{--                </div><!-- End .collapse -->--}}
{{--            </div><!-- End .card -->--}}

{{--            <div class="card">--}}
{{--                <div class="card-header" id="heading-3">--}}
{{--                    <h2 class="card-title">--}}
{{--                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">--}}
{{--                            Cash on delivery--}}
{{--                        </a>--}}
{{--                    </h2>--}}
{{--                </div><!-- End .card-header -->--}}
{{--                <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">--}}
{{--                    <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.--}}
{{--                    </div><!-- End .card-body -->--}}
{{--                </div><!-- End .collapse -->--}}
{{--            </div><!-- End .card -->--}}

{{--            <div class="card">--}}
{{--                <div class="card-header" id="heading-4">--}}
{{--                    <h2 class="card-title">--}}
{{--                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">--}}
{{--                            PayPal <small class="float-right paypal-link">What is PayPal?</small>--}}
{{--                        </a>--}}
{{--                    </h2>--}}
{{--                </div><!-- End .card-header -->--}}
{{--                <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">--}}
{{--                    <div class="card-body">--}}
{{--                        Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.--}}
{{--                    </div><!-- End .card-body -->--}}
{{--                </div><!-- End .collapse -->--}}
{{--            </div><!-- End .card -->--}}

{{--            <div class="card">--}}
{{--                <div class="card-header" id="heading-5">--}}
{{--                    <h2 class="card-title">--}}
{{--                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">--}}
{{--                            Credit Card (Stripe)--}}
{{--                            <img src="assets/images/payments-summary.png" alt="payments cards">--}}
{{--                        </a>--}}
{{--                    </h2>--}}
{{--                </div><!-- End .card-header -->--}}
{{--                <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">--}}
{{--                    <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.--}}
{{--                    </div><!-- End .card-body -->--}}
{{--                </div><!-- End .collapse -->--}}
{{--            </div><!-- End .card -->--}}
{{--        </div><!-- End .accordion -->--}}

{{--        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">--}}
{{--            <span class="btn-text">Place Order</span>--}}
{{--            <span class="btn-hover-text">Proceed to Checkout</span>--}}
{{--        </button>--}}
{{--    </div><!-- End .summary -->--}}
{{--</aside><!-- End .col-lg-3 -->--}}
