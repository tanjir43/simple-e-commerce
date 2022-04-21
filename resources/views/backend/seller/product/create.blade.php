@extends('backend.seller.master')

@section('title')
    add-product
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Add Product Form</div>
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
                    <form class="form-horizontal" action="{{route('seller-product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="text" placeholder="Title" value="{{old('title')}}" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Summary</label>
                            <div class="col-sm-10">
                                <textarea name="summary" id="summernote" class="form-control" placeholder="Product summary">{!!html_entity_decode(old('summary'))!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="summernote" class="form-control description" placeholder="Product description">{!!html_entity_decode(old('description'))!!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Additional info</label>
                            <div class="col-sm-10">
                                <textarea name="additional_info" id="summernote" class="form-control description " placeholder="Additional info">{!!html_entity_decode(old('additional_info'))!!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Return cancellation </label>
                            <div class="col-sm-10">
                                <textarea name="return_cancellation" id="summernote" class="form-control description" placeholder="Return cancellation">{!!html_entity_decode(old('return_cancellation'))!!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="stock" type="number" placeholder="Stock" value="{{old('stock')}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="price" type="number" step="any" placeholder="Price" value="{{old('price')}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Discount</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="discount" type="number" step="any" min="0" max="100" placeholder="Discount" value="{{old('discount')}}" >
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
                                    <input id="thumbnail" class="form-control" type="text" name="photo" required>
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Size guide</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail1" class="form-control" type="text" name="size_guide" >
                                </div>
                                <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Brands<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="brand_id" class="form-control">
                                    <option value="" disabled selected>--Brands--</option>
                                        @foreach(\App\Models\Brand::get() as $brand)
                                        <option value="{{$brand->id}}" {{old('brand_id')==$brand->id ? 'selected' : ''}} >{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select id="cat_id" name="cat_id" class="form-control">
                                    <option value="" disabled selected>--Category--</option>
                                    @foreach(\App\Models\Category::where('is_parent',1)->get() as $category)
                                        <option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected' : ''}} >{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row d-none" id="child_cat_div">
                            <label class="col-sm-2 col-form-label">Child category<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select id="child_cat_id"  name="child_cat_id" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Size<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="size" class="form-control">
                                    <option value="" disabled selected>--Size--</option>
                                    <option value="S" {{old('size'== 'S' ? 'selected' : '')}}>small</option>
                                    <option value="M" {{old('size'== 'M' ? 'selected' : '')}}>medium</option>
                                    <option value="L" {{old('size'== 'L' ? 'selected' : '')}}>large</option>
                                    <option value="XL" {{old('size'== 'XL' ? 'selected' : '')}}>extra-large</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Conditions<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="conditions" class="form-control">
                                    <option value="" disabled selected>--Conditions--</option>
                                    <option value="new" {{old('conditions'== 'new' ? 'selected' : '')}}>new</option>
                                    <option value="popular" {{old('conditions'== 'popular' ? 'selected' : '')}}>popular</option>
                                    <option value="winter" {{old('conditions'== 'winter' ? 'selected' : '')}}>winter</option>
                                </select>
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-2 col-form-label">Added By<span class="text-danger">*</span></label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <select name="added_by" class="form-control">--}}
{{--                                    <option value="admin" {{old('added_by')=='admin'? 'selected' : ''}}>Admin</option>--}}
{{--                                    @foreach(\App\Models\Seller::orderBy('full_name','ASC')->get() as $item)--}}
{{--                                        <option value="{{$item->id}}" {{old('vendor_id')==$item->id ? 'selected' : ''}}>{{$item->full_name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

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
                                <button class="btn btn-info " type="submit">Create new Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>

    <script>
        $('#cat_id').change(function () {
            var cat_id = $(this).val();
            // alert(cat_id);
            if(cat_id != null){
                $.ajax({
                    url : "/admin/category/"+cat_id+"/child",
                    type: "POST",
                    data: {
                        _token:"{{csrf_token()}}",
                        cat_id: cat_id,
                    },
                    success:function (response) {
                        var html_option = "<option value=''>---Child Category---</option>";
                        if(response.status){
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data,function (id,title) {
                                html_option += "<option value='"+id+"'>"+title+"</option>"
                            });
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            }
        });
    </script>
@endsection
