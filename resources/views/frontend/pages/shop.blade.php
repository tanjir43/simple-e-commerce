@extends('frontend.master')

@section('title')
    all-shop
@endsection

@section('body')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('/')}}'assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shop</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <form action="{{route('shop.filter')}}" method="post">
                    @csrf
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Total <span>{{$products->total()}} </span> Products
                                </div>
                            </div>

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortBy" onchange="this.form.submit();" id="sortBy" class="form-control">
                                            <option value="" >Default sort</option>
                                            <option value="priceAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceAsc') selected @endif >Price - Lower To Higher </option>
                                            <option value="priceDesc"  @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceDesc') selected @endif >Price - Higher To Lower </option>
                                            <option value="titleAsc"  @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleAsc') selected @endif >Alphabetical Ascending </option>
                                            <option value="titleDesc"  @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleDesc') selected @endif >Alphabetical Descending </option>
                                            <option value="discountAsc"  @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'discountAsc') selected @endif >Discount - Lower To Higher </option>
                                            <option value="discountDesc"  @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'discountDesc') selected @endif >Discount - Higher To Lower</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @if(count($products)>0)
                                    @foreach($products as $product)
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">{{$product->conditions}}</span>
                                            @php
                                                $photo = explode(',',$product->photo)
                                            @endphp
                                            <a href="{{route('product.details',$product->slug)}}">
                                                <img src="{{$photo[0]}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                            </div>

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div>
                                        </figure>

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{\App\Models\Category::where('id',$product->id)->value('title')}}</a>
                                            </div>
                                            <h3 class="product-title"><a href="{{route('product.details',$product->slug)}}">{{$product->title}}</a></h3>
                                            <div class="product-price">
                                                $ {{ number_format($product->offer_price,2)}} <small class="ml-3"><del class="text-black-50">was {{number_format($product->price,2)}}</del></small>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div>
                                                </div>
                                                <span class="ratings-text">( 2 Reviews )</span>
                                            </div>

                                            <div class="product-nav product-nav-thumbs">
                                                <a href="#">
                                                    @foreach($photo as $key=>$photo)
                                                            <img src="{{$photo}}" alt="product side">
                                                    @endforeach
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @else
                                    <p class="text-danger text-center">No products found</p>
                                @endif
                            </div>
                        </div>
                        {{$products->appends($_GET)->links('vendor.pagination.custom')}}
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div>


                            @if(count($cats)>0)

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            @if(!empty($_GET['category']))
                                            @php
                                            $filter_cats = explode(',',$_GET['category']);
                                            @endphp
                                            @endif

                                            @foreach($cats as $cat)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if(!empty($filter_cats) && in_array($cat->slug,$filter_cats)) checked @endif name="category[]" onchange="this.form.submit();" value="{{$cat->slug}}" class="custom-control-input" id="{{$cat->slug}}">
                                                    <label class="custom-control-label" for="{{$cat->slug}}">{{ucfirst($cat->title)}}</label>
                                                </div>
                                                <span class="item-count">{{count($cat->products)}}</span>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                            @if(count($brands)>0)
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        @if(!empty($_GET['brand']))
                                            @php
                                                $filter_brands = explode(',',$_GET['brand']);
                                            @endphp
                                        @endif

                                            @foreach($brands as $brand)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"  @if(!empty($filter_brands) && in_array($brand->slug,$filter_brands)) checked @endif class="custom-control-input" id="{{$brand->slug}}" name="brand[]" value="{{$brand->slug}}" onchange="this.form.submit();">
                                                    <label class="custom-control-label" for="{{$brand->slug}}">{{$brand->title}}</label>
                                                    <span class="item-count text-black-50 float-right"> {{count($brand->products)}}</span>
                                                </div>
                                            </div>
                                            @endforeach

                                    </div>
                                </div>
                            </div>
                            @endif


                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                        Size
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-2">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"  name="size" value="S" @if(!empty($_GET['size']) && $_GET['size']=='S') checked @endif onchange="this.form.submit();" id="size-1">
                                                    <label class="custom-control-label" for="size-1">S</label>
                                                    <span class="item-count text-black-50 float-right">{{\App\Models\Product::where(['status'=>'active','size'=>'S'])->count()}}</span>
                                                </div>
                                            </div>

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"  name="size" value="M" @if(!empty($_GET['size']) && $_GET['size']=='M') checked @endif onchange="this.form.submit();" id="size-2">
                                                    <label class="custom-control-label" for="size-2">M</label>
                                                    <span class="item-count text-black-50 float-right">{{\App\Models\Product::where(['status'=>'active','size'=>'M'])->count()}}</span>
                                                </div>
                                            </div>

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"  name="size" value="L" @if(!empty($_GET['size']) && $_GET['size']=='L') checked @endif onchange="this.form.submit();" id="size-3">
                                                    <label class="custom-control-label" for="size-3">L</label>
                                                    <span class="item-count text-black-50 float-right">{{\App\Models\Product::where(['status'=>'active','size'=>'L'])->count()}}</span>
                                                </div>
                                            </div>
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"  name="size" value="XL" @if(!empty($_GET['size']) && $_GET['size']=='XL') checked @endif onchange="this.form.submit();" id="size-4">
                                                    <label class="custom-control-label" for="size-4">XL</label>
                                                    <span class="item-count text-black-50 float-right">{{\App\Models\Product::where(['status'=>'active','size'=>'XL'])->count()}}</span>
                                                </div>
                                            </div>

                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection


@section('scripts')






@endsection
