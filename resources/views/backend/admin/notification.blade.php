@if($success = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" id="alert" role="alert">
        <strong>{{$success}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif($error = Session::get('errors'))
    <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert">
        <strong>{{$error}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

