@extends('backend.admin.master')

@section('title')
    add-coupon
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Add Coupon Form</div>
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
                    <form class="form-horizontal" action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Coupon Code</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="code" type="text" placeholder="Code" value="{{old('code')}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> value</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="value" type="number" placeholder="Value" value="{{old('value')}}" required >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Condition<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                    <option value="" disabled selected>--Type--</option>
                                    <option value="fixed" {{old('condition'== 'fixed' ? 'selected' : '')}}>Fixed</option>
                                    <option value="percent" {{old('condition'== 'percent' ? 'selected' : '')}}>Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control">
                                    <option value="" disabled selected>--Status--</option>
                                    <option  value="active" {{old('status'== 'active' ? 'selected' : '')}}>active</option>
                                    <option value="inactive" {{old('status'== 'inactive' ? 'selected' : '')}}>inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Create new Coupon</button>
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
