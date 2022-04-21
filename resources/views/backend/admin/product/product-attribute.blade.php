@extends('backend.admin.master')

@section('title')
    manage-product-attributes
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Product attributes Info</div>
                    <div class="ibox-title float-right text-success">Total Products : {{\App\Models\Product::count()}}</div>
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
                    @include('backend.admin.notification')
                    <h5><strong>{{ucfirst($product->title)}}</strong></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('product.attribute',$product->id)}}" method="POST">
                                @csrf
                            <div id="product_attribute" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                                <div class="row">
                                    <div class="col-md-12"><button type="button" id="btnAdd-1" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></div>
                                </div>
                                <div class="row group">
                                    <div class="col-md-2">
                                        <label for="">Size</label>
                                        <input class="form-control" name="size[]" placeholder="Size" type="text">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Original price</label>
                                        <input class="form-control" name="original_price[]" placeholder="original price" type="number" step="any">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Offer price</label>
                                        <input class="form-control" name="offer_price[]" placeholder="offer price" type="number" step="any">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Stock </label>
                                        <input class="form-control" name="stock[]" type="number">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btnRemove mt-4"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="mt-2 btn btn-outline-success">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <table id="example-table" class="table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>offer</th>
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                    @if( count($productAttr)>0)
                                        @foreach($productAttr as $product)
                                        <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->size}}</td>
                                    <td>$ {{ number_format($product->original_price,2)}}</td>
                                    <td>$ {{number_format($product->offer_price,2)}}</td>
                                    <td>{{$product->stock}}</td>

                                    <td>
                                        <form class="float-left ml-1" action="{{route('product.productAttr.destroy',$product->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$product->id}}"></i></a>
                                        </form>
                                    </td>
                                        </tbody>
                                        @endforeach
                                    @endif

                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/')}}assets/js/jquery.multifield.min.js"></script>
    <script>
        $('#product_attribute').multifield();
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
