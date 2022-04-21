@extends('frontend.master')

@section('title')
    user dashboard
@endsection
@section('body')


    <div class="page-header mb-0 pb-0  text-center" style="background-image: url('{{asset('/')}}assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title"><span>{{$user->full_name}}'s</span></h1>
            <h5 class="page-title"><span>Edit Profile</span></h5>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-0 mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.dashboard')}}">My account</a></li>
                <li class="breadcrumb-item"><a href="{{route('account.edit')}}">Edit profile</a></li>
                <li class="breadcrumb-item ml-auto"><a href="{{route('users.profile')}}"><strong>Back to Profile details</strong></a></li>
            </ol>
        </div>
    </nav>


    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title text-center"><h4><strong>Edit Profile form</strong></h4></div>
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

                            <form class="form-horizontal" action="{{route('account.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Full name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="full_name" type="text" placeholder="full name" value="{{$user->full_name}}" >
                                        @error('full_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Display name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="username" type="text" placeholder="username" value="{{$user->username}}">
                                        @error('username')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="phone" type="number" placeholder="phone" value="{{$user->phone}}">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                                        <span class="input-group-btn">
                                                       <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary btn-lg">
                                                           <i class="fa fa-picture-o "></i> Choose
                                                       </a>
                                                         </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo">
                                        </div>

                                        <div id="holder" style="margin-top:15px;max-height:100px;">
                                            <img src="{{asset($user->photo)}}"  width="100" alt="">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" disabled name="email" type="email" placeholder="email" value="{{$user->email}}">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"   type="password" placeholder="password" name="oldpassword" value="">
                                        @error('oldpassword')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Create new password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"  type="password" placeholder="create new password" name="newpassword" value="">
                                        @error('newpassword')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10 ml-sm-auto">
                                        <button class="btn btn-info " type="submit">Update Profile </button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
