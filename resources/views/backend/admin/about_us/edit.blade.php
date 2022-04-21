@extends('backend.admin.master')

@section('title')
    edit-about us
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit about us Form</div>
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

                        <form class="form-horizontal" action="{{route('about_us.update',$about_us->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" >
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{asset($about_us->photo)}}" width="80" alt=""></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Full name</label>
                            <div class="col-sm-10">
                                <input type="text" name="full_name" class="form-control" value="{{$about_us->full_name}}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Designation</label>
                            <div class="col-sm-10">
                                <input type="text" name="designation" class="form-control" value="{{$about_us->designation}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
