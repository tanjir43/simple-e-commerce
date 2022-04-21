@extends('frontend.master')
@section('style')
@endsection

@section('title')
    user dashboard
@endsection
@section('body')

    <div class="page-header mb-0 pb-0  text-center" style="background-image: url('{{asset('/')}}assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title"><span>{{$user->full_name}}'s</span></h1>
            <h5 class="page-title"><span>Address-edit</span></h5>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-0 mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.dashboard')}}">My account</a></li>
                <li class="breadcrumb-item"><a href="{{route('user.address-edit')}}">Address-edit</a></li>
                <li class="breadcrumb-item ml-auto"><a href="{{route('users.address')}}"><strong>Back to address</strong></a></li>
            </ol>
        </div>
    </nav>


    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title text-center"><h4><strong>Edit address form</strong></h4></div>
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
                        <form class="form-horizontal" action="{{route('user.address-update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" placeholder="address">{!! $user->address !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="country" type="text" placeholder="country" value="{{$user->country}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="city" type="text" placeholder="city" value="{{$user->city}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="state" type="text" placeholder="state" value="{{$user->state}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Post code</label>
                                <div class="col-sm-10">
                                    <input class="form-control"  name="postcode" type="number" placeholder="post code" value="{{$user->postcode}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info " type="submit">Update address</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection

