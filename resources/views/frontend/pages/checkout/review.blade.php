@extends('frontend.master')
@section('title')
    checkout-3
@endsection
@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('/')}}'assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Review<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Payment </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Review</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <form action="{{route('checkout.store')}}" method="post">
                        @csrf
                        <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Title</th>
                                <th>photo</th>
                                <th>quantity</th>
                                <th>price</th>

                            </tr>
                            </thead>

                                <tbody>
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('product.details',$item->model->slug)}}"> {{$item->model->title}}</a>  </td>
                                    <td><a href="{{route('product.details',$item->model->slug)}}"><img src="{{$item->model->photo}}" width="100" alt=""></a> </td>
                                    <td>{{$item->qty}}</td>
                                    <td>$ {{number_format($item->price,2)}}</td>

                                </tr>
                                @endforeach

                                </tbody>

                        </table>


                            <div class="row">
                                <div class="container">
                                    <div class="col-lg-12">
                                        <div class="summary">
                                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                            <table class="table table-summary">

                                                <tbody>

                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>$ {{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                                </tr><!-- End .summary-subtotal -->
                                                <tr>
                                                    <td>Shipping:</td>
                                                    <td>$ {{number_format(Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}</td>
                                                </tr>
                                                @if(Illuminate\Support\Facades\Session::has('coupon'))
                                                <tr>
                                                    <td>Coupon:</td>
                                                    <td>$ {{number_format(Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}</td>
                                                </tr>
                                                @endif


                                                <tr class="summary-total">
                                                    <td>Total:</td>


{{--                                                    @if(Illuminate\Support\Facades\Session::has('coupon'))--}}
{{--                                                    <td>$ {{number_format(\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}</td>--}}


                                                    @if(Illuminate\Support\Facades\Session::has('coupon') && Illuminate\Support\Facades\Session::has('checkout'))
{{--                                                         <td>${{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge']-Illuminate\Support\Facades\Session::get('coupon')['value']),2}}</td--}}
                                                        <td> {{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+ +Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge']-session('coupon')['value'],2)}}</td>

                                                        @elseif(Illuminate\Support\Facades\Session::has('checkout'))
                                                            <td>$ {{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}</td>

                                                        @elseif(session()->has('coupon'))
                                                            <td>$ {{session('coupon')['value'],2}}</td>
                                                    @else
                                                        <td>{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}</td>

                                                        @endif
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-block btn-outline-success">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


