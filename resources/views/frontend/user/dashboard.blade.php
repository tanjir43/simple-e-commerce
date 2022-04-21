@extends('frontend.master')
@section('style')
    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{asset('/')}}asset-d/plugins/themefisher-font/style.css">
    {{--<!-- bootstrap.min css -->--}}
    <link rel="stylesheet" href="{{asset('/')}}asset-d/plugins/bootstrap/css/bootstrap.min.css">
@endsection
@section('title')
    user dashboard
@endsection
@section('body')

    <div class="page-header mb-0 pb-0  text-center" style="background-image: url('{{asset('/')}}assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title"><span>{{$user->full_name}}'s</span></h1>
            <h5 class="page-title"><span>Dashboard</span></h5>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-0 mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My account</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.dashboard')}}">dashboard</a></li>
            </ol>
        </div>
    </nav>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a class="{{\Request::is('user/dashboard')?'active' :''}}" href="{{route('users.dashboard')}}">Dashboard</a></li>
                        <li><a class="{{\Request::is('user/orders')?'active' :''}}" href="{{route('users.orders')}}">Orders</a></li>
                        <li><a class="{{\Request::is('user/address')?'active' :''}}" href="{{route('users.address')}}">Address</a></li>
                        <li><a class="{{\Request::is('user/address')?'active' :''}}" href="{{route('users.shipping-address')}}">Shipping Address</a></li>

                        <li><a class="{{\Request::is('user/profile')?'active' :''}}" href="{{route('users.profile')}}">Profile Details</a></li>
                        <li><a href="{{route('users.logout')}}">Logout</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">
                            <div class="pull-left">
                                @if(auth()->user()->photo)
                                <img class="media-object user-img" src="{{auth()->user()->photo}}" alt="Image">
                                @else
                                    <img class="media-object user-img" src="{{Helper::userDefaultImage()}}" alt="Image">
                                @endif
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading">Welcome <strong>{{$user->full_name}}!</strong></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, iure, est. Sit mollitia est maxime! Eos
                                    cupiditate tempore, tempora omnis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, nihil. </p>
                            </div>
                        </div>
                        <div class="total-order mt-20">
                            <h4>Total Orders</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total Price</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="#!">#252125</a></td>
                                        <td>Mar 25, 2016</td>
                                        <td>2</td>
                                        <td>$ 99.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#!">#252125</a></td>
                                        <td>Mar 25, 2016</td>
                                        <td>2</td>
                                        <td>$ 99.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#!">#252125</a></td>
                                        <td>Mar 25, 2016</td>
                                        <td>2</td>
                                        <td>$ 99.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

