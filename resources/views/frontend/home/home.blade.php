@extends('frontend.master')

@section('title')
    home
@endsection


@section('style')
    <link rel="stylesheet" href="{{asset('/')}}assets/css/plugins/owl-carousel/owl.carousel.css">
@endsection


@section('body')
    <main class="main">
            <div class="intro-slider-container mb-5">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
                     data-owl-options='{
                        "dots": true,
                        "nav": false,

                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    @if(count($banners)>0)
                    @foreach($banners as $banner)
                        <div class="intro-slide" style="background-image: url({{$banner->photo}});">
                            <div class="container intro-content">
                                <div class="row justify-content-end">
                                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                        <h3 class="intro-subtitle text-primary">New Arrival</h3>
                                        <h1 class="intro-title">{{$banner->title}}</h1>

                                        <div class="intro-price">
                                            <h3>{!! $banner->description !!}</h3>
                                            {{--                                    <sup>Today:</sup>--}}
                                            {{--                                    <span class="text-primary">--}}
                                            {{--                                            $999<sup>.99</sup>--}}
                                            {{--                                        </span>--}}
                                        </div>

                                        <a href="{{$banner->slug}}" class="btn btn-primary btn-round">
                                            <span>Shop More</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .col-md-6 offset-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->
                    @endforeach
                </div><!-- End .intro-slider owl-carousel owl-simple -->

{{--                <span class="slider-loader"></span><!-- End .slider-loader -->--}}
            </div>
        @endif

        @if(count($categories)>0)
            <div class="container">
                <h2 class="title text-center mb-4">Explore Popular Categories</h2>
                <div class="cat-blocks-container">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="{{route('product.category',$category->slug)}}" class="cat-block">
                                    <figure>
                                    <span>
                                        <img src="{{$category->photo}}" alt="{{$category->title}}">
                                    </span>
                                    </figure>
                                    <h3 class="cat-block-title">{{$category->title}}</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->

            </div><!-- End .container -->
        @endif
        <div class="mb-4"></div><!-- End .mb-4 -->


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="assets/images/demos/demo-4/banners/banner-1.png" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Smart Offer</a></h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#">Save $150 <strong>on Samsung <br>Galaxy Note9</strong></a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="assets/images/demos/demo-4/banners/banner-2.jpg" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Time Deals</a></h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#"><strong>Bose SoundSport</strong> <br>Time Deal -30%</a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="assets/images/demos/demo-4/banners/banner-3.png" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Clearance</a></h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#"><strong>GoPro - Fusion 360</strong> <br>Save $70</a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- End .mb-5 -->

            <div class="container for-you">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title"> New Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                    <div class="heading-right">
                        <a href="#" class="title-link">View All <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="products">
                    <div class="row justify-content-center">
                        @foreach($new_products as $new_product)
                            <div class=" col-md-2 ">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">{{$new_product->conditions}}</span>
                                        @php
                                            $photo = explode(',',$new_product->photo)
                                        @endphp
                                        <a href="{{route('product.details',$new_product->slug)}}">
                                            <img src="{{$photo[0]}}" alt="{{$new_product->title}}" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="javascript:void(0)" class="add_to_wishlist btn-product-icon btn-wishlist btn-expandable" data-quantity="1" data-id="{{$new_product->id}}" id="add_to_wishlist_{{$new_product->id}}" title="Add to wishlist"></a>
                                        </div>

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart add_to_cart" data-quantity="1" data-product-id="{{$new_product->id}}" id="add_to_cart{{$new_product->id}}" title="Add to cart"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div>
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{\App\Models\Category::where('id',$new_product->child_cat_id)->value('title')}}</a>
                                            <a href="#" class="float-right">{{\App\Models\Brand::where('id',$new_product->brand_id)->value('title')}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('product.details',$new_product->slug)}}">{{$new_product->title}}</a></h3>
                                        <div class="product-price">
                                            $ {{number_format($new_product->offer_price,2)}} <small class="text-black-50 ml-3"><del>${{number_format($new_product->price,2)}}</del></small>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                            </div>
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div>
                                    </div>
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        @endforeach

                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- End .container -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        <div class="container">
            <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-1.jpg);">
                <img src="assets/images/demos/demo-4/camera.png" alt="camera" class="cta-img">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="cta-content">
                            <div class="cta-text text-right text-white">
                                <p>Shop Today’s Deals <br><strong>Awesome Made Easy. HERO7 Black</strong></p>
                            </div><!-- End .cta-text -->
                            <a href="#" class="btn btn-primary btn-round"><span>Shop Now - $429.99</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .cta-content -->
                    </div><!-- End .col-md-12 -->
                </div><!-- End .row -->
            </div><!-- End .cta -->
        </div><!-- End .container -->

        <div class="container">
            <div class="heading text-center mb-3">
                <h2 class="title">Deals & Outlet</h2><!-- End .title -->
                <p class="title-desc">Today’s deal and more</p><!-- End .title-desc -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-lg-6 deal-col">
                    <div class="deal" style="background-image: url('assets/images/demos/demo-4/deal/bg-1.jpg');">
                        <div class="deal-top">
                            <h2>Deal of the Day.</h2>
                            <h4>Limited quantities. </h4>
                        </div><!-- End .deal-top -->

                        <div class="deal-content">
                            <h3 class="product-title"><a href="product.html">Home Smart Speaker with  Google Assistant</a></h3><!-- End .product-title -->

                            <div class="product-price">
                                <span class="new-price">$129.00</span>
                                <span class="old-price">Was $150.99</span>
                            </div><!-- End .product-price -->

                            <a href="product.html" class="btn btn-link"><span>Shop Now</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .deal-content -->

                        <div class="deal-bottom">
                            <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                        </div><!-- End .deal-bottom -->
                    </div><!-- End .deal -->
                </div><!-- End .col-lg-6 -->

                <div class="col-lg-6 deal-col">
                    <div class="deal" style="background-image: url('assets/images/demos/demo-4/deal/bg-2.jpg');">
                        <div class="deal-top">
                            <h2>Your Exclusive Offers.</h2>
                            <h4>Sign in to see amazing deals.</h4>
                        </div><!-- End .deal-top -->

                        <div class="deal-content">
                            <h3 class="product-title"><a href="product.html">Certified Wireless Charging  Pad for iPhone / Android</a></h3><!-- End .product-title -->

                            <div class="product-price">
                                <span class="new-price">$29.99</span>
                            </div><!-- End .product-price -->

                            <a href="login.html" class="btn btn-link"><span>Sign In and Save money</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .deal-content -->

                        <div class="deal-bottom">
                            <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                        </div><!-- End .deal-bottom -->
                    </div><!-- End .deal -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="more-container text-center mt-1 mb-5">
                <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>Shop more Outlet deals</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div><!-- End .container -->

        <div class="container">
            <hr class="mb-0">
            <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl"
                 data-owl-options='{
                        "nav": false,
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>

                @if(count($brands)>0)
                    @foreach($brands as $brand)
                <a href="#" class="brand">
                    <img src="{{asset($brand->photo)}}" alt="Brand Name">
                </a>
                    @endforeach
                @endif
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->

        <div class="bg-light pt-5 pb-6">
            <div class="container trending-products">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Trending Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                    <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">Top Rated</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-best-link" data-toggle="tab" href="#trending-best-tab" role="tab" aria-controls="trending-best-tab" aria-selected="false">Best Selling</a>
                            </li>
                        </ul>
                    </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="row">
                    <div class="col-xl-5col d-none d-xl-block">
                        <div class="intro-slide"  style="background-image: url({{$promo_banner->photo}});">

                                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                        <h2 class="text-center">{{$promo_banner->title}}</h2>

                                        <div class="intro-price">
                                            <h3 class="text-center ">{!! $promo_banner->description !!}</h3>

                                        </div>

                                        <a href="{{$promo_banner->slug}}" class="btn btn-primary btn-round">
                                            <span>Shop More</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                 </div>
                            </div>
                    <div class="col-xl-4-5col">
                        <div class="tab-content tab-content-carousel just-action-icons-sm">
                            <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                     data-owl-options='{
                                            "nav": true,
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                }
                                            }
                                        }'>
                                    @if(count($top_rated)>0)
                                        @foreach($top_rated as $item)
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-top">{{$item->conditions}}</span>
                                            <a href="{{route('product.details',$item->slug)}}">
                                                <img src="{{asset($item->photo)}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$item->category['title']}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">{{$item->title}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                {{Helper::currency_converter($item->offer_price)}} was <span class="text-black-50"><del> {{ Helper::currency_converter($item->price)}}</span></del>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="">
                                                    <div class="" style="width: 100%;">
                                                        @for($i=0; $i<5; $i++)
                                                            @if(round($item->reviews->avg('rate'))>$i)
                                                                <i class="icon-star text-warning"></i>
                                                            @else
                                                                <i class="icon-star-o"></i>
                                                            @endif
                                                        @endfor
                                                    </div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( {{$item->reviews->count()}} Reviews )</span>
                                            </div><!-- End .rating-container -->
                                            <div class="ml-2">
                                                <a href="javascript:;"data-quantity="1" data-product-id="{{$item->id}}" id="add_to_cart{{$item->id}}"  class="add_to_cart pl-5"><i class="icon-shopping-cart"></i></a>
                                                <a href="javascript:;"class="add_to_wishlist pl-5" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><i class="icon-heart-o"></i></a>
                                                <a href="javascript:;"class="add_to_compare pl-5" data-id="{{$item->id}}"id="add_to_compare{{$item->id}}" title="Compare"><i class="icon-random"></i></a>
                                            </div><!-- End .product-nav -->

                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                        @endforeach
                                    @endif

                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane p-0 fade" id="trending-best-tab" role="tabpanel" aria-labelledby="trending-best-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                     data-owl-options='{
                                            "nav": true,
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                }
                                            }
                                        }'>

                                @if(count($best_selling)>0)
                                    @foreach($best_selling as $item)
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{asset($item->photo)}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$item->category['title']}}</a>
                                            </div>
                                            <h3 class="product-title"><a href="{{route('product.details',$item->slug)}}">{{$item->title}}</a></h3>
                                            <div class="product-price">
                                                {{Helper::currency_converter($item->offer_price)}} was <span class="text-black-50"><del>{{Helper::currency_converter($item->price)}}</span></del>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="">
                                                    <div class="" style="width: 60%;">
                                                        @for($i=0; $i<5; $i++)
                                                            @if(round($item->reviews->avg('rate'))>$i)
                                                                <i class="icon-star text-warning"></i>
                                                            @else
                                                                <i class="icon-star-o"></i>
                                                            @endif
                                                                @endfor
                                                    </div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( {{$item->reviews->count()}} Reviews )</span>
                                            </div><!-- End .rating-container -->
                                            <div class="ml-2">
                                                <a href="javascript:;"data-quantity="1" data-product-id="{{$item->id}}" id="add_to_cart{{$item->id}}"  class="add_to_cart pl-5"><i class="icon-shopping-cart"></i></a>
                                                <a href="javascript:;"class="add_to_wishlist pl-5" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><i class="icon-heart-o"></i></a>
                                                <a href="javascript:;"class="add_to_compare pl-5" data-id="{{$item->id}}"id="add_to_compare{{$item->id}}" title="Compare"><i class="icon-random"></i></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                        @endforeach
                                    @endif
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .col-xl-4-5col -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-light pt-5 pb-6 -->

        <div class="mb-5"></div><!-- End .mb-5 -->

        <div class="container for-you">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title"> Featured Products</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                    <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="products">
                <div class="row justify-content-center">
                    @foreach($featured_products as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-sale">Sale</span>
                                <a href="product.html">
                                    <img src="{{asset($item->photo)}}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Headphones</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Beats by Dr. Dre Wireless  Headphones</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">$279.99</span>
                                    <span class="old-price">Was $349.99</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach

                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- End .container -->

        <div class="mb-4"></div><!-- End .mb-4 -->

        <div class="container">
            <hr class="mb-0">
        </div><!-- End .container -->

        <div class="icon-boxes-container bg-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                <p>Orders $50 or more</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                <p>Within 30 days</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                <p>when you sign up</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                <p>24/7 amazing services</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->
    </main><!-- End .main -->
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
                    $('#add_to_cart'+product_id).html('<i class="icon-spinner"></i><small></small>');
                },
                complete:function () {
                    $('#add_to_cart'+product_id).html('<small><i class="icon-cart-plus"></i><small class="text-warning">Added</small></small>');
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
                    $('#add_to_wishlist_'+product_id).html('<i class="icon-spinner"></i><small>Loading...</small>');
                },
                complete:function () {
                    $('#add_to_wishlist_'+product_id).html('<small><i class="icon-heartbeat"></i><small class="text-warning"></small></small>');
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

@endsection
