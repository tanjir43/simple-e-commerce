@extends('backend.admin.master')

@section('title')
@endsection

@section('body')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{\App\Models\Category::where('status','active')->count()}}</h2>
                        <div class="m-b-5">Total Category</div><i class="fa fa-sitemap widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{\App\Models\Product::where('status','active')->count()}}</h2>
                        <div class="m-b-5">Total Products</div><i class="fa fa-suitcase widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">$1570</h2>
                        <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-money widget-stat-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{\App\Models\User::where('status','active')->count()}}</h2>
                        <div class="m-b-5">New Customers</div><i class="fa fa-user-plus widget-stat-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Orders</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item">option 1</a>
                                <a class="dropdown-item">option 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
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
                                        <a href="{{route('coupon.edit',$order->id)}}"  title="view" data-placement="bottom" class="float-left btn btn-outline-info ml-4  btn-sm"><i class="fa fa-eye"></i></a>

                                        <form class="float-left ml-1" action="{{route('coupon.destroy',$order->id)}}" method="POST">
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
                        <div class="ibox-footer text-center">
                            <a href="javascript:;">View All Products</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>




@endsection
