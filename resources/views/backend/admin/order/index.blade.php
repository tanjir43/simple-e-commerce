@extends('backend.admin.master')

@section('title')
    manage-order
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Order Info</div>
                    <div class="ibox-title float-right text-success">Total Coupons : {{\App\Models\Order::count()}}</div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')
                    <table class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Payment method</th>
                            <th>Payment Status</th>
                            <th>Total </th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </tr>
                        </thead>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->first_name}} {{$order->last_name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->payment_method=='cod' ? "Cash on delivery" : $order->payment_method}}</td>
                                <td>{{ucfirst($order->payment_status)}}</td>
                                <td>{{number_format($order->total_amount,2)}}</td>
                                <td><span class="badge
                            @if($order->condition == 'pending')
                                        badge-info
@elseif($order->condition=='processing')
                                        badge-primary
@elseif($order->condition=='delivered')
                                        badge-success
@else
                                        badge-danger
@endif
                                        ">{{$order->condition}}</span></td>
                                <td>
                                    <a href="{{route('order.show',$order->id)}}"  title="view" data-placement="bottom" class="float-left btn btn-outline-info ml-4  btn-sm"><i class="fa fa-eye"></i></a>

                                    <form class="float-left ml-1" action="{{route('order.destroy',$order->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$order->id}}"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td>No orders</td>
                        @endforelse
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
                url : "{{route('coupon.status')}}",
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


