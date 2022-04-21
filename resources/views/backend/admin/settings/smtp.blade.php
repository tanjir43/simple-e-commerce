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

                    <form class="form-horizontal" action="{{route('smtp.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="MAIL_DRIVER">
                            <label class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select name="MAIL_DRIVER" id="" class="form-control"  onchange="checkMailDriver();">
                                    <option value="sendmail" @if(env('MAIL_DRIVER')=='sendmail') selected @endif>SendMail</option>
                                    <option value="smtp" @if(env('MAIL_DRIVER')=='smtp') selected @endif>SMTP</option>
                                    <option value="mailgun" @if(env('MAIL_DRIVER')=='mailgun') selected @endif>MailGun</option>
                                </select>
                            </div>
                        </div>

                        <div id="smtp">
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_HOST">
                                <label class="col-sm-2 col-form-label">MAIL HOST</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAIL_HOST" value="{{env('MAIL_HOST')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_PORT">
                                <label class="col-sm-2 col-form-label">MAIL PORT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAIL_PORT" value="{{env('MAIL_PORT')}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                                <label class="col-sm-2 col-form-label">MAIL ENCRYPTION</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{env('MAIL_ENCRYPTION')}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_USERNAME">
                                <label class="col-sm-2 col-form-label">MAIL USERNAME</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAIL_USERNAME" value="{{env('MAIL_USERNAME')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                                <label class="col-sm-2 col-form-label">MAIL PASSWORD</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{env('MAIL_PASSWORD')}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                                <label class="col-sm-2 col-form-label">MAIL FROM ADDRESS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{env('MAIL_FROM_ADDRESS')}}">
                                </div>
                            </div>
                        </div>

                        <div id="mailgun">
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
                                <label class="col-sm-2 col-form-label">MAILGUN DOMAIN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAILGUN_DOMAIN" value="{{env('MAILGUN_DOMAIN')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MAILGUN_SECRET">
                                <label class="col-sm-2 col-form-label">MAILGUN SECRET</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="MAILGUN_SECRET" value="{{env('MAILGUN_SECRET')}}">
                                </div>
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
    <script>
        $(document).ready(function () {
            checkMailDriver();
        });
        function checkMailDriver(){
            if($('select[name=MAIL_DRIVER]').val()=='mailgun'){
                $('#mailgun').show();
                $('#smtp').hide();
            }
            else{
                $('#mailgun').hide();
                $('#smtp').show();
            }
        }
    </script>
























@endsection
