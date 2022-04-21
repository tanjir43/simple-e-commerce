@extends('backend.admin.master')

@section('title')
    add-banner
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Settings </div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form class="form-horizontal" action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">
                       @method('put')
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Project Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="text" placeholder="Title" value="{{$setting->title}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Meta Description</label>
                            <div class="col-sm-10">
                                <textarea name="meta_description" id="summernote"  required  class="form-control" placeholder="meta description">{!!html_entity_decode($setting->meta_description)  !!}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Meta keywords</label>
                            <div class="col-sm-10">
                                <textarea name="meta_keywords" id="summernote"  required  class="form-control" placeholder="meta keywords">{!!html_entity_decode($setting->meta_keywords)  !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="logo" required>
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{asset($setting->logo)}}" width="100" alt=""></div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Favicon</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail1" class="form-control" type="text" name="favicon" required>
                                </div>
                                <div id="holder1" style="margin-top:15px;max-height:100px;"><img src="{{asset($setting->favicon)}}" width="100" alt=""></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="address" type="text" placeholder="address" value="{{$setting->address}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Footer</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="footer" type="text" placeholder="footer" value="{{$setting->footer}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" placeholder="email" value="{{$setting->email}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Phone</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="phone" type="number" placeholder="phone" value="{{$setting->phone}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fax</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="fax" type="text" placeholder="fax" value="{{$setting->fax}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Facebook Url</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="facebook_url" type="text" placeholder="facebook_url" value="{{$setting->facebook_url}}"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Twitter Url</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="twitter_url" type="text" placeholder="twitter_url" value="{{$setting->twitter_url}}"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">linked in Url</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="linkedin_url" type="text" placeholder="linkedin_url" value="{{$setting->linkedin_url}}"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pinterest Url</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="pinterest_url" type="text" placeholder="pinterest_url" value="{{$setting->pinterest_url}}"  >
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Update Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
