@extends('backend.admin.master')

@section('title')
    add-shipping
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Add Shipping Form</div>
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
                    <form class="form-horizontal" action="{{route('shipping.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Shipping address</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="shipping_address" type="text" placeholder="Shipping address" value="{{old('shipping_address')}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Delivery time </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="delivery_time" type="text" placeholder="Delivery time" value="{{old('delivery_time')}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Delivery Charge </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="delivery_charge" type="number" step="any" placeholder="Delivery Charge" value="{{old('delivery_charge')}}" required >
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
                                <button class="btn btn-info " type="submit">Create new Shipping</button>
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
