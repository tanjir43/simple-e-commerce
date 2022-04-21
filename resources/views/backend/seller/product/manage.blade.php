@extends('backend.seller.master')

@section('title')
    manage-product
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">All Products Info</div>
                    <div class="ibox-title float-right text-success">Total Products : {{$products->count()}}</div>
                </div>
                <div class="ibox-body">
                    @include('backend.admin.notification')

                    <table class="table table-striped table-bordered table-hover " id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Size</th>
                            <th>Conditions</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($products as $product)
                            @php
                            $photo = explode(',',$product->photo);
                            @endphp
                            <tbody>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->title}}</td>
                            <td><img src="{{$photo[0]}}" alt="" width="100"></td>
                            <td>$ {{number_format($product->price,2)}}</td>
                            <td>{{number_format($product->discount)}}%</td>
                            <td>{{$product->size}}</td>
                            <td>
                                @if($product->conditions == 'new')
                                    <h3 class=""><span class="badge badge-success ml-5" >{{$product->conditions}}</span></h3>
                                @elseif($product->conditions == 'popular')
                                    <span class="badge badge-primary ml-5" >{{$product->conditions}}</span>
                                @else
                                    <span class="badge badge-warning ml-5">{{$product->conditions}}</span>
                                @endif
                            </td>
                            <td>
                                <input  type="checkbox"  name="toggle" value="{{$product->id}}" {{$product->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                            </td>
                            <td>
                                <a href="{{route('seller-product.show',$product->id)}}"  class="float-left ml-2 btn btn-outline-secondary btn-sm"><i class="fa fa-plus-circle"></i></a>
                                <a href="" data-toggle="modal" data-target="#productID{{$product->id}}"  class="float-left ml-2 btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a>

                                <a href="{{route('seller-product.edit',$product->id)}}" class="float-left ml-2 btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>

                                <form class="float-left ml-1" action="{{route('seller-product.destroy',$product->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$product->id}}"></i></a>
                                </form>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="productID{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    @php
                                    $product = \App\Models\Product::where('id',$product->id)->first();
                                    @endphp

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{Str::upper($product->title)}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Summary : </strong>
                                            <p>{{html_entity_decode($product->summary)}}
                                            </p><strong>Description : </strong>
                                            <p>{{html_entity_decode($product->description)}}</p>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Price :  </strong>
                                                    <p>$ {{number_format($product->price,2)}} </p>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong>Offer price :  </strong>
                                                    <p>$ {{number_format($product->offer_price,2)}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong> Stock :  </strong>
                                                    <p> {{$product->stock}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Category :  </strong>
                                                    <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}} </p>
                                                </div>
                                                <div class="col-md-6">
                                                   <strong>Child category  :  </strong>
                                                    <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Brand :  </strong>
                                                    <p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}} </p>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong> Size  :  </strong>
                                                    <p class="badge badge-success">{{$product->size}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                   <strong> Vendor  :  </strong>
                                                    <p class="">{{\App\Models\User::where('id', $product->vendor_id)->value('full_name')}}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Conditions :  </strong>
                                                    <p class="badge badge-warning">{{$product->conditions}} </p>
                                                </div>
                                                <div class="col-md-6">
                                                   <strong>Status :  </strong>
                                                    <p class="badge badge-info">{{$product->status}} </p>
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
            var id   = $(this).val();
            $.ajax({
                url  : "{{route('seller.product.status')}}",
                type : "POST",
                data :{
                    _token : '{{csrf_token()}}',
                    mode : mode,
                    id   : id,
                },
                success: function (response) {
                    if(response.status){
                        alert(response.msg)
                    }else{
                        alert('Please try again');
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example-table').DataTable();
        } );
    </script>

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
