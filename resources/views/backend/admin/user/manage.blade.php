@extends('backend.admin.master')
@section('title')
    manage-users
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Users Info</div>
                    <div class="ibox-title float-right text-success">Total Category :{{\App\Models\User::count()}}</div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')

                    <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Full name</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tbody>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->full_name}}</td>
                            <td class="text-center"><img src="{{asset($user->photo)}}" alt=""  width="80" style="border-radius: 50%" ></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>

                            <td>
                                <input type="checkbox"  name="toggle" value="{{$user->id}}" {{$user->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#userID{{$user->id}}"  class="float-left  btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a>


                                <a href="{{route('users.edit',$user->id)}}" class="float-left btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>

                                <form class="float-left " action="{{route('users.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$user->id}}"></i></a>
                                </form>
                            </td>

                            <!-- Modal -->

                            <div class="modal fade" id="userID{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    @php
                                        $user = \App\Models\User::where('id',$user->id)->first();
                                    @endphp

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{Str::upper($user->full_name)}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Username :  </strong>
                                                    <p>{{$user->username}} </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Photo  :  </strong>
                                                    <p><img src="{{asset($user->photo)}}" width="60" alt=""></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Email :  </strong>
                                                    <p>{{$user->email}} </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Address  :  </strong>
                                                    <p>{{$user->address}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Role :  </strong>
                                                    <p>{{$user->role}} </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Status  :  </strong>
                                                    <p class="badge badge-info">{{$user->status}}</p>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                url : "{{route('users.status')}}",
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
