@extends('backend.admin.master')

@section('title')
    edit- {{$coupon->title}}
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Coupon Form</div>
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
                    <form class="form-horizontal" action="{{route('coupon.update',$coupon->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Code</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="code" type="text" placeholder="Code" value="{{$coupon->code}}" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Value</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="value" type="text" placeholder="Value" value="{{$coupon->value}}" required >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Type<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                    <option value="" disabled selected>--Type--</option>
                                    <option value="fixed" {{$coupon->type== 'fixed' ? 'selected' : ''}}>Fixed</option>
                                    <option value="percent" {{$coupon->type== 'percent' ? 'selected' : ''}}>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control">
                                    <option value="" disabled selected>--Status--</option>
                                    <option value="active" {{$coupon->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive" {{$coupon->status== 'inactive' ? 'selected' : ''}}>inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Update Coupon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



