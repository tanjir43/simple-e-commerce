@extends('backend.admin.master')

@section('title')
    add-payment
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Payment </div>
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

                    <form class="form-horizontal" action="{{route('paypal.setting.update')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="payment_method" value="paypal">
                        @method('patch')
                        @csrf

                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="PAYPAL_CLIENT_ID">
                                <label class="col-sm-2 col-form-label">Paypal Client ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="PAYPAL_CLIENT_ID" value="{{env('PAYPAL_CLIENT_ID')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="PAYPAL_CLIENT_SECRET">
                                <label class="col-sm-2 col-form-label">Paypal Client SECRET</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="PAYPAL_CLIENT_SECRET" value="{{env('PAYPAL_CLIENT_SECRET')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Paypal sandbox</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" class="form-control mx-left" name="paypal_sandbox" value="1" @if(get_setting('paypal_sandbox')==1) checked @endif>
                                </div>
                            </div>


                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-success " type="submit">Save changes </button>
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
