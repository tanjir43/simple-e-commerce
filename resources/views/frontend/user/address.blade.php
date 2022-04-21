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
            <h5 class="page-title"><span>Address</span></h5>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-0 mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.dashboard')}}">My account</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.address')}}">Address</a></li>
            </ol>
        </div>
    </nav>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a href="{{route('users.dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('users.orders')}}">Orders</a></li>
                        <li><a class="active" href="{{route('users.address')}}">Address</a></li>
                        <li><a class="" href="{{route('users.shipping-address')}}">Shipping Address</a></li>
                        <li><a href="{{route('users.profile')}}">Profile Details</a></li>
                        <li><a href="{{route('users.logout')}}">Logout</a></li>

                    </ul>

                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr >
                                    <th class="text-center">Country</th>
                                    <th class="text-center">State/District</th>
                                    <th class="text-center">City</th>
                                    <th class="text-center">Post code</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td  class="text-center">{{$user->country}}</td>
                                    <td  class="text-center">{{$user->state}}</td>
                                    <td  class="text-center">{{$user->city}}</td>
                                    <td  class="text-center"> {{$user->postcode}}</td>
                                    <td  class="text-center">{!! $user->address !!}</td>
                                    <td  class="text-center">
                                            <a href="{{route('user.address-edit')}}"><button type="button" class="btn btn-default"><i class="tf-pencil2"  aria-hidden="true" ></i></button></a>
                                    </td>
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

