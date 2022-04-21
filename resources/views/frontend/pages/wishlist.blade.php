@extends('frontend.master')

@section('title')
    wishlist
@endsection


@section('body')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{'/'}}assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Wishlist<span>Shop</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container" >
                <div id="wishlist_list">
               @include('frontend.pages._wishlist')
                </div>
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Share on:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection


@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).on('click','.move-to-cart',function (e) {
            e.preventDefault();
            var rowId = $(this).data('id');
            var token = "{{csrf_token()}}";
            var path  = "{{route('wishlist.move.cart')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    rowId:rowId,
                },
                beforeSend:function () {
                    $(this).html('<i class="fa fa-spinner fa-spin">Moving to cart...</i>')
                },
                success:function (data) {
                    if(data['status']){
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    }
                    else{
                        swal({
                            title: "Oops!",
                            text: data['message'],
                            icon: "Something went wrong",
                            button: "Ok",
                        });
                    }
                },
                error:function (err) {
                    swal({
                        title: "Error!",
                        text: "some error",
                        icon: "error",
                        button: "Ok",
                    });
                }
            })
        })
    </script>

    <script>
        $('.delete_wishlist').on('click',function (e) {
            e.preventDefault();
            var rowId = $(this).data('id');
            var token = "{{csrf_token()}}";
            var path  = "{{route('wishlist.delete')}}";

            $.ajax({
                url : path,
                type:"POST",
                data:{
                    _token:token,
                    rowId:rowId,
                },
                success:function (data) {
                    if (data['status']){
                    $('body #cart_counter').html(data['cart_count']);
                    $('body #wishlist_list').html(data['wishlist_list']);
                    $('body #header-ajax').html(data['header']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    }
                    else{
                        swal({
                            title: "Oops!",
                            text: data['message'],
                            icon: "Something went wrong",
                            button: "Ok",
                        });
                    }
                },
                error:function (err) {
                    swal({
                        title: "Error!",
                        text: "some error",
                        icon: "error",
                        button: "Ok",
                    });
                }

            });
        })
    </script>
@endsection
