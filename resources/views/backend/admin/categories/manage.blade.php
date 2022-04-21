@extends('backend.admin.master')
@section('title')
    manage-category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Categories Info</div>
                    <div class="ibox-title float-right text-success">Total Category :{{\App\Models\Category::count()}}</div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')

                    <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Is- parent</th>
                            <th>Parent</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($categories as $category)
                            <tbody>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->title}}</td>
                                <td class="text-center"><img src="{{asset($category->photo)}}" width="100" alt=""></td>
                                <td>{{$category->is_parent == 1 ? 'Yes' : 'No'}}</td>
                                <td>{{\App\Models\Category::where('id',$category->parent_id)->value('title')}}</td>

                                <td>
                                    <input type="checkbox"  name="toggle" value="{{$category->id}}" {{$category->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                                </td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="float-left btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>

                                    <form class="float-left ml-1" action="{{route('category.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$category->id}}"></i></a>
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
                url : "{{route('category.status')}}",
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

    -    delete category part--}}
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
