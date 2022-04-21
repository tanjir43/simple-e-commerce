@extends('backend.admin.master')

@section('title')
    edit - {{$product->title}}
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Product Form</div>
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
                    <form class="form-horizontal" action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="title" type="text" placeholder="Title" value="{{$product->title}}"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Summary</label>
                            <div class="col-sm-10">
                                <textarea name="summary" id="summernote" class="form-control" placeholder="Product summary">{!!html_entity_decode($product->summary)!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="summernote" class="form-control" placeholder="Product description">{!!html_entity_decode($product->description)!!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Additional info</label>
                            <div class="col-sm-10">
                                <textarea name="additional_info" id="summernote" class="form-control description " placeholder="Additional info">{!!html_entity_decode($product->additional_info)!!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Return cancellation </label>
                            <div class="col-sm-10">
                                <textarea name="return_cancellation" id="summernote" class="form-control description" placeholder="Return cancellation">{!!html_entity_decode($product->return_cancellation)!!}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="stock" type="number" placeholder="Stock" value="{{$product->stock}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="price" type="number" step="any" placeholder="Price" value="{{$product->price}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Discount</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="discount" type="number" step="any" min="0" max="100" placeholder="Discount" value="{{$product->discount}}">
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
                                <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{asset($product->photo)}}" height="100" width="150" alt=""></div>
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
                                <div id="holder1" style="margin-top:15px;max-height:100px;"><img src="{{asset($product->size_guide)}}" width="150" alt=""></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Brands<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="brand_id" class="form-control">
                                    <option value="" disabled selected>--Brands--</option>
                                    @foreach(\App\Models\Brand::get() as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id==$product->brand_id ? 'selected' : '' }}>{{$brand->title}}</option>
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
                                        <option value="{{$category->id}}" {{$category->id==$product->cat_id ? 'selected' : '' }}>{{$category->title}}</option>
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
                                    <option value="S" {{$product->size == 'S' ? 'selected' : ''}}>small</option>
                                    <option value="M" {{$product->size == 'M' ? 'selected' : ''}}>medium</option>
                                    <option value="L" {{$product->size == 'L' ? 'selected' : ''}}>large</option>
                                    <option value="XL"{{$product->size== 'XL' ? 'selected' : ''}}>extra-large</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Conditions<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="conditions" class="form-control">
                                    <option value="" disabled selected>--Conditions--</option>
                                    <option value="new" {{$product->conditions == 'new' ? 'selected' : ''}}>new</option>
                                    <option value="popular" {{$product->conditions == 'popular' ? 'selected' : ''}}>popular</option>
                                    <option value="winter" {{$product->conditions == 'winter' ? 'selected' : ''}}>winter</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Vendors<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="vendor_id" class="form-control">
                                    <option value="" disabled selected>--Vendors--</option>
                                    @foreach(\App\Models\User::where('role','vendor')->get() as $vendor)
                                        <option value="{{$vendor->id}}" {{$vendor->id==$product->vendor_id ? 'selected' : '' }}>{{$vendor->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control">
                                    <option value="" disabled selected>--Status--</option>
                                    <option  value="active" {{$product->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive"{{$product->status== 'inactive' ? 'selected' : ''}}>inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Update Product</button>
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
        var  child_cat_id = {{$product->child_cat_id}}
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
                                html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected' : '')+">"+title+"</option>"
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
        if(child_cat_id != null){
            $('#cat_id').change();
        }
    </script>
@endsection
