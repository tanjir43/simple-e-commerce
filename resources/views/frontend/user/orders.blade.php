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
            <h5 class="page-title"><span>Orders</span></h5>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-0 mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My account</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.orders')}}">Orders</a></li>
            </ol>
        </div>
    </nav>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a href="{{route('users.dashboard')}}">Dashboard</a></li>
                        <li><a class="active" href="{{route('users.orders')}}">Orders</a></li>
                        <li><a href="{{route('users.address')}}">Address</a></li>
                        <li><a href="{{route('users.shipping-address')}}">Shipping Address</a></li>

                        <li><a href="{{route('users.profile')}}">Profile Details</a></li>
                        <li><a href="{{route('users.logout')}}">Logout</a></li>

                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>#451231</td>
                                    <td>Mar 25, 2016</td>
                                    <td>2</td>
                                    <td>$99.00</td>
                                    <td><span class="label label-primary">Processing</span></td>
                                    <td><a href="order.html" class="btn btn-default">View</a></td>
                                </tr>
                                <tr>
                                    <td>#451231</td>
                                    <td>Mar 25, 2016</td>
                                    <td>3</td>
                                    <td>$150.00</td>
                                    <td><span class="label label-success">Completed</span></td>
                                    <td><a href="order.html" class="btn btn-default">View</a></td>
                                </tr>
                                <tr>
                                    <td>#451231</td>
                                    <td>Mar 25, 2016</td>
                                    <td>3</td>
                                    <td>$150.00</td>
                                    <td><span class="label label-danger">Canceled</span></td>
                                    <td><a href="order.html" class="btn btn-default">View</a></td>
                                </tr>
                                <tr>
                                    <td>#451231</td>
                                    <td>Mar 25, 2016</td>
                                    <td>2</td>
                                    <td>$99.00</td>
                                    <td><span class="label label-info">On Hold</span></td>
                                    <td><a href="order.html" class="btn btn-default">View</a></td>
                                </tr>
                                <tr>
                                    <td>#451231</td>
                                    <td>Mar 25, 2016</td>
                                    <td>3</td>
                                    <td>$150.00</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td><a href="order.html" class="btn btn-default">View</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

