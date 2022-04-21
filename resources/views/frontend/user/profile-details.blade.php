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
            <h5 class="page-title"><span>Profile</span></h5>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-0 mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My account</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.profile')}}">Profile</a></li>
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
                        <li><a href="{{route('users.address')}}">Address</a></li>
                        <li><a href="{{route('users.shipping-address')}}">Shipping address</a></li>
                        <li><a class="active" href="{{route('users.profile')}}">Profile Details</a></li>
                        <li><a href="{{route('users.logout')}}">Logout</a></li>

                    </ul>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="row">
                            <div class="container">
                                <div class="col-md-12">
                                    <a href="{{route('account.edit')}}" class="btn btn-default  float-right">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left text-center" href="#!">
                                <img class="media-object user-img" src="{{asset($user->photo)}}" alt="Image">
                            </div>
                            <div class="media-body">
                                <ul class="user-profile-list">
                                    <li><span>Full Name:</span>{{$user->full_name}}</li>
                                    <li><span>Username:</span>{{$user->username}}</li>
                                    <li><span>Country:</span>{{$user->country}}</li>
                                    <li><span>Email:</span>{{$user->email}}</li>
                                    <li><span>Phone:</span>{{$user->phone}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
