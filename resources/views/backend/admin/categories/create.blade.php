@extends('backend.admin.master')

@section('title')
    add-category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Add Category Form</div>
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
                    <form class="form-horizontal" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="text" placeholder="Title" value="{{old('title')}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Summary</label>
                            <div class="col-sm-10">
                                <textarea name="summary" id="summernote"   class="form-control" placeholder="Banner summary">{!!html_entity_decode(old('summary'))  !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" >
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Is parent : <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                <input type="checkbox" id="is_parent" name="is_parent" value="1" checked> Yes
                            </div>
                        </div>

                        <div class="form-group row d-none" id="parent_cat_div">
                            <label class="col-sm-2 col-form-label">Parent Id <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control">
                                    <option value="" disabled selected>--Parent Category--</option>
                                        @foreach($parent_cats as $parent_cat)
                                        <option value="{{$parent_cat->id}}" {{old('parent_id' == $parent_cat->id ? 'selected' : '')}}>{{$parent_cat->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control">
                                    <option value="" disabled selected>--Status--</option>
                                    <option  value="active" {{old('status'== 'active' ? 'selected' : '')}}>active</option>
                                    <option value="inactive" {{old('status'== 'inactive' ? 'selected' : '')}}>inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Create new Category</button>
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
        $('#is_parent').change(function (e) {
            e.preventDefault();
            var is_checked = $('#is_parent').prop('checked');
            // alert(is_checked);
            if(is_checked){
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div').val('');
            }else{
                $('#parent_cat_div').removeClass('d-none');
            }
        });
    </script>
@endsection
