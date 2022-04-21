@extends('frontend.master')

@section('title')
    your-cart
@endsection


@section('body')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('/')}}assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                            <tbody>

                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                            <tr>
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="{{route('product.details',$item->model->slug)}}">
                                                <img src="{{asset($item->model->photo)}}" alt="Product image">
                                            </a>
                                        </figure>
                                    </div>
                                </td>
                                <td>
                                    <h3 class="product-title">
                                        <a href="{{route('product.details',$item->model->slug)}}">{{$item->name}}</a>
                                    </h3>
                                </td>

                                <td class="price-col">$ {{number_format($item->price,2)}}</td>

                                <td class="quantity-col">
                                    <div class="cart-product-quantity">
                                        <form action="{{route('cart.update',['rowId'=>$item->rowId])}}" method="POST">
                                            @csrf
                                            <input type="number" class="ok form-control" name="qty" value="{{$item->qty}}" min="1" max="10" step="1" data-decimals="0" required>
{{--                                            <input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">--}}

                                            <input class="form-control d-flex" type="submit" value="Update">

                                        </form>
                                    </div><!-- End .cart-product-quantity -->
                                </td>
                                <td> <input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">
                                </td>

                                <td class="total-col">$ {{$item->subtotal()}}</td>
                                <td><a href="#" class="btn-remove cart-delete"  title="Remove Product" data-id="{{$item->rowId}}"><i class="icon-close"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>

                            </table>

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="{{route('coupon.add')}}" method="post" id="coupon-form">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="code" required placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="coupon-btn btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    @if(session()->has('coupon'))
                                    <tr class="summary-subtotal">
                                        <td>Coupon:</td>
                                        <td>
                                                <span class="ml-auto"> $ {{session('coupon')['value']}}</span>
                                            @endif
                                        </td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>{{$item->subtotal()}}</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$0.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$10.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Express:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$20.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        @if(session()->has('coupon'))
                                        <td>${{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-session('coupon')['value'],2)}}</td>
                                        @else
                                            <td>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>

                                <a href="{{route('checkout1')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="{{route('homes')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div>
        </div>


    </main><!-- End .main -->
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).on('click','.coupon-btn',function (e) {
            e.preventDefault();
            var code = $('input[name=code]').val();

            $('.coupon-btn').html('<small>Applying...</small>');
            $('#coupon-form').submit();
        })
    </script>


    <script>
        $(document).on('click','.cart-delete',function (e) {
            e.preventDefault();
            var cart_id = $(this).data('id');

            var token = "{{csrf_token()}}";
            var path  = "{{route('cart.delete')}}";

            $.ajax({
                url:path,
                type: "POST",
                dataType : "JSON",
                data:{
                    cart_id:cart_id,
                    _token:token,
                },
                success:function (data) {
                    console.log(data);

                    $('body #header-ajax').html(data['header']);
                    $('body #cart_counter').html(data['cart_count']);

                    if(data['status']){
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    }
                },
                error:function (err) {
                    console.log(err);
                }
            });
        });
    </script>





{{--    <script>--}}
{{--        $(document).on('click','.qty-text{{$item->rowId}}',function () {--}}
{{--       var id = $(this).data('id');--}}
{{--        alert(id);--}}
{{--        });--}}
{{--    </script>--}}
@endsection





