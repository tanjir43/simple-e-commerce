@extends('frontend.master')

@section('title')
    user dashboard
@endsection
@section('body')


    <div class="page-header mb-0 pb-0  text-center" style="background-image: url('{{asset('/')}}assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title"><span>{{$user->full_name}}'s</span></h1>
            <h5 class="page-title"><span>Edit shipping address</span></h5>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-0 mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.dashboard')}}">My account</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.edit-shipping-address')}}">Edit shipping address</a></li>
                <li class="breadcrumb-item ml-auto"><a href="{{route('users.shipping-address')}}"><strong>Back to shipping address</strong></a></li>
            </ol>
        </div>
    </nav>


    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title text-center"><h4><strong>Edit shipping address form</strong></h4></div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{route('user.shipping-address-update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Shipping Address</label>
                                <div class="col-sm-10">
                                    <textarea name="saddress" class="form-control" placeholder="address">{!! $user->saddress !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Shipping  Country</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="scountry" type="text" placeholder="country" value="{{$user->scountry}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Shipping City</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="scity" type="text" placeholder="city" value="{{$user->scity}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Shipping State</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="sstate" type="text" placeholder="state" value="{{$user->sstate}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Shipping Post code</label>
                                <div class="col-sm-10">
                                    <input class="form-control"  name="spostcode" type="number" placeholder="post code" value="{{$user->spostcode}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info " type="submit">Update Shipping  address</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

