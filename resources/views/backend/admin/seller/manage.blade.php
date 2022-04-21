@extends('backend.admin.master')

@section('title')
    manage-seller
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Seller Info</div>
                    <div class="ibox-title float-right text-success">Total Sellers : {{\App\Models\Seller::count()}}</div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')

                    <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Full name</th>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Photo</th>
                            <th>Is_verified</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($sellers as $seller)
                            <tbody>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$seller->full_name}}</td>
                                        <td>{{$seller->username}}</td>
                                        <td>{!! html_entity_decode($seller->address) !!}</td>
                                        <td>{{$seller->email}}</td>
                                        <td>{{$seller->phone}}</td>

                                        <td>
                                            <img src="{{$seller->photo== null ? Helper::userDefaultImage() :  asset($seller->photo)}}" width="60" alt="">
                                        </td>
                                        <td>{{$seller->is_verified ? 'Yes' : 'No'}}</td>
                                        <td>
                                            <input type="checkbox"  name="toggle" value="{{$seller->id}}" {{$seller->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                        </td>
                                        <td>
                                            <input type="checkbox"  name="verified" value="{{$seller->id}}" {{$seller->is_verified ? 'checked' : ''}} data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                        </td>
                                        <td>
                                            <a href="{{route('seller.edit',$seller->id)}}"  title="edit" data-placement="bottom" class="float-left btn btn-outline-info ml-4  btn-sm"><i class="fa fa-edit"></i></a>

                                            <form class="float-left ml-1" action="{{route('seller.destroy',$seller->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$seller->id}}"></i></a>
                                            </form>
                                        </td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('input[name=toggle]').change(function () {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url : "{{route('seller.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id  :id,
                },
                success:function (response) {
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again');
                    }
                }
            });
        })
    </script>

    <script>
        $('input[name=verified]').change(function () {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url : "{{route('seller.verified')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id  :id,
                },
                success:function (response) {
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again');
                    }
                }
            });
        })
    </script>

{{--    delete banner part--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form   = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });
    </script>
@endsection


