@extends('backend.admin.master')

@section('title')
    manage-banner
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Banner Info</div>
                    <div class="ibox-title float-right text-success">Total Banners : {{\App\Models\Banner::count()}}</div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')

                    <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Condition</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($banners as $banner)
                            <tbody>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$banner->title}}</td>
                            <td>{{$banner->slug}}</td>
                            <td>{!! html_entity_decode($banner->description) !!}</td>
                            <td>
                                <img src="{{asset($banner->photo)}}" width="80" alt="">
                            </td>
                            <td>
                                @if($banner->conditions == 'banner')
                                    <h3 class=""><span class="badge badge-success ml-2" >{{$banner->conditions}}</span></h3>
                                @else
                                    <span class="badge badge-primary ml-2" >{{$banner->conditions}}</span>
                                @endif
                            </td >
                            <td>
                                <input type="checkbox"  name="toggle" value="{{$banner->id}}" {{$banner->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                            </td>
                            <td>
                                <a href="{{route('banner.edit',$banner->id)}}"  title="edit" data-placement="bottom" class="float-left btn btn-outline-info ml-4  btn-sm"><i class="fa fa-edit"></i></a>

                                <form class="float-left ml-1" action="{{route('banner.destroy',$banner->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$banner->id}}"></i></a>
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


