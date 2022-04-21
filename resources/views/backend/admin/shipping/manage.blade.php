@extends('backend.admin.master')

@section('title')
    manage-shippings
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Shipping Info</div>
                    <div class="ibox-title float-right text-success">Total Banners : {{\App\Models\Shipping::count()}}</div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')

                    <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Shipping Address</th>
                            <th>Delivery Time</th>
                            <th>Delivery Charge</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($shippings as $shipping)
                            <tbody>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$shipping->shipping_address}}</td>
                                        <td>{{$shipping->delivery_time}}</td>
                                        <td>{{number_format($shipping->delivery_charge,2)}}</td>
                                        <td>
                                            <input type="checkbox"  name="toggle" value="{{$shipping->id}}" {{$shipping->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                        </td>
                                        <td>
                                            <a href="{{route('shipping.edit',$shipping->id)}}"  title="edit" data-placement="bottom" class="float-left btn btn-outline-info ml-4  btn-sm"><i class="fa fa-edit"></i></a>

                                            <form class="float-left ml-1" action="{{route('shipping.destroy',$shipping->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$shipping->id}}"></i></a>
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
                url : "{{route('shipping.status')}}",
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


