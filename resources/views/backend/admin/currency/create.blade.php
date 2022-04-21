@extends('backend.admin.master')

@section('title')
    add-currency
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Add Currency Form</div>
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

                    <form class="form-horizontal" action="{{route('currency.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Currency name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" placeholder="Name" value="{{old('name')}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Symbol</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="symbol" type="text" placeholder="symbol" value="{{old('symbol')}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Exchange rate</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="exchange_rate" type="number"  step="any" placeholder="exchange rate" value="{{old('exchange_rate')}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Code</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="code" type="text" placeholder="Code" value="{{old('code')}}" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control">
                                    <option  value="active" {{old('status'== 'active' ? 'selected' : '')}}>active</option>
                                    <option value="inactive" {{old('status'== 'inactive' ? 'selected' : '')}}>inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Create new Currency</button>
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
