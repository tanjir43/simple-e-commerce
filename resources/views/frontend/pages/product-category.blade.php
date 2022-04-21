@extends('frontend.master')

@section('title')
    Categories
@endsection

@section('body')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('/')}}assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">{{$categories->title}}<span>Shop</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Categories <i class="fa f"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">{{$categories->title}}</a></li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters </a>
                    </div>

{{--                    <div class="toolbox-center">--}}
{{--                        <div class="toolbox-info">--}}
{{--                            Showing <span>12 of 56</span> Products--}}
{{--                        </div><!-- End .toolbox-info -->--}}
{{--                    </div><!-- End .toolbox-center -->--}}

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Sort by:</label>
                            <div class="select-custom">
                                <select name="sortby" id="sortBy" class="form-control">
                                    <option value="default" selected="selected">Default sort</option>
                                    <option value="priceAsc">Price - Lower To Higher </option>
                                    <option value="priceDesc">Price - Higher To Lower </option>
                                    <option value="priceDesc">Alphabetical Ascending </option>
                                    <option value="titleDesc">Alphabetical Descending </option>
                                    <option value="discountAsc">Discount - Lower To Higher </option>
                                    <option value="discountDesc">Discount - Higher To Lower</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="products">
                    <div class="row" id="product-data" >
                    @include('frontend.pages._single-product')
                    </div>
                    <div class="row">
                    <div class="ajax-loader mx-auto">
                        <img src="{{asset('assets/images/load-loading1.gif')}}" style="width: 40px ;"   alt="">
                    </div>
                    </div>
                </div>

                <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
                <aside class="sidebar-shop sidebar-filter">
                    <div class="sidebar-filter-wrapper">
                        <div class="widget widget-clean">
                            <label><i class="icon-close"></i>Filters</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-1">
                                                <label class="custom-control-label" for="cat-1">Dresses</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">3</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-2">
                                                <label class="custom-control-label" for="cat-2">T-shirts</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">0</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-3">
                                                <label class="custom-control-label" for="cat-3">Bags</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">4</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-4">
                                                <label class="custom-control-label" for="cat-4">Jackets</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">2</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-5">
                                                <label class="custom-control-label" for="cat-5">Shoes</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">2</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-6">
                                                <label class="custom-control-label" for="cat-6">Jumpers</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">1</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-7">
                                                <label class="custom-control-label" for="cat-7">Jeans</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">1</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-8">
                                                <label class="custom-control-label" for="cat-8">Sportwear</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">0</span>
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Size
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-1">
                                                <label class="custom-control-label" for="size-1">XS</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-2">
                                                <label class="custom-control-label" for="size-2">S</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-3">
                                                <label class="custom-control-label" for="size-3">M</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-4">
                                                <label class="custom-control-label" for="size-4">L</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-5">
                                                <label class="custom-control-label" for="size-5">XL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-6">
                                                <label class="custom-control-label" for="size-6">XXL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Colour
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                    </div><!-- End .filter-colors -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-1">
                                                <label class="custom-control-label" for="brand-1">Next</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-2">
                                                <label class="custom-control-label" for="brand-2">River Island</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-3">
                                                <label class="custom-control-label" for="brand-3">Geox</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-4">
                                                <label class="custom-control-label" for="brand-4">New Balance</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-5">
                                                <label class="custom-control-label" for="brand-5">UGG</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-6">
                                                <label class="custom-control-label" for="brand-6">F&F</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-7">
                                                <label class="custom-control-label" for="brand-7">Nike</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider"></div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar-filter-wrapper -->
                </aside><!-- End .sidebar-filter -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#sortBy').change(function () {
            var sort = $('#sortBy').val();

            window.location = "{{url(''.$route.'')}}/{{$categories->slug}}?sort="+sort;
        });
    </script>

    <script>
        function loadmoreData(page){
            $.ajax({
                url  : '?page='+page,
                type : 'get',
                beforeSend:function () {
                    $('.ajax-loader').show();
                },
            })
            .done(function (data) {
                if(data.html==''){
                    $('.ajax-loader').html('No more product available');
                    return;
                }
                $('.ajax-loader').hide();
                $('#product-data').append(data.html);
            })
            .fail(function () {
                alert("Something went wrong! Please try again");
            })
        }
        var page = 1;
        $(window).scroll(function () {
            if($(window).scrollTop()+$(window).height()+120>=$(document).height()){
                page++;
                loadmoreData(page);
            }
        })
    </script>
{{--    Add to cart--}}
    <script>
    $(document).on('click','.add_to_cart',function (e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        var product_qty = $(this).data('quantity');

        var token = "{{csrf_token()}}";
        var path  = "{{route('cart.store')}}";

            $.ajax({
                url:path,
                type: "POST",
                dataType : "JSON",
                data:{
                product_id:product_id,
                product_qty : product_qty,
                _token:token,
            },
            beforeSend:function () {
                $('#add_to_cart'+product_id).html('<i class="fas fa-spinner fa-spin"></i><small>Loading...</small>');
            },
            complete:function () {
                $('#add_to_cart'+product_id).html('<small><i class="fas fa-cart-plus"></i><small class="text-warning">Added to cart</small></small>');
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

{{--    Add to wishlist--}}

    <script>
        $(document).on('click','.add_to_wishlist',function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');

            var token = "{{csrf_token()}}";
            var path  = "{{route('wishlist.store')}}";

            $.ajax({
                url:path,
                type: "POST",
                dataType : "JSON",
                data:{
                    product_id:product_id,
                    product_qty : product_qty,
                    _token:token,
                },
                beforeSend:function () {
                    $('#add_to_wishlist_'+product_id).html('<i class="fa fa-spinner fa-spin"></i><small>Loading...</small>');
                },
                complete:function () {
                    $('#add_to_wishlist_'+product_id).html('<small><i class="fa fa-heart"></i><small class="text-warning"></small></small>');
                },
                success:function (data) {
                    console.log(data);
                    $('body #header-ajax').html(data['header']);
                    $('body #wishlist_counter').html(data['wishlist_count']);
                    if(data['status']){
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    }
                    else if(data['present']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Oops!",
                            text: data['message'],
                            icon: "warning",
                            button: "Ok",
                        });
                    }
                    else{
                        swal({
                            title: "Sorry!",
                            text: "You can't add that product ",
                            icon: "error",
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




    {{--    Add to compare--}}

    <script>
        $(document).on('click','.add_to_compare',function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var token = "{{csrf_token()}}";
            var path  = "{{route('compare.store')}}";

            $.ajax({
                url:path,
                type: "POST",
                dataType : "JSON",
                data:{
                    product_id:product_id,
                    _token:token,
                },
                beforeSend:function () {
                    $('#add_to_compare_'+product_id).html('<i class="fa fa-spinner fa-spin"></i><small>Loading...</small>');
                },
                complete:function () {
                    $('#add_to_compare_'+product_id).html('<small><i class="fa fa-heart"></i><small class="text-warning"></small></small>');
                },
                success:function (data) {
                    console.log(data);
                    $('body #header-ajax').html(data['header']);
                    $('body #compare_counter').html(data['compare_count']);
                    if(data['status']){
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok",
                        });
                    }
                    else if(data['present']){
                        $('body #header-ajax').html(data['header']);
                        $('body #compare_counter').html(data['compare_count']);
                        swal({
                            title: "Oops!",
                            text: data['message'],
                            icon: "warning",
                            button: "Ok",
                        });
                    }
                    else{
                        swal({
                            title: "Sorry!",
                            text: data['message'],
                            icon: "error",
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

@endsection







