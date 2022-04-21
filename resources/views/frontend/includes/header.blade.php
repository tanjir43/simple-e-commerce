<div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
            </div>

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <div class="header-dropdown">
                                    @php
                                        Helper::currency_load();
                                        $currency_code  = session('currency_code');
                                        $currency_symbol= session('currency_symbol');

                                        if ($currency_symbol ==""){
                                            $system_default_currency_info = session('system_default_currency_info');
                                            $currency_symbol = $system_default_currency_info->symbol;
                                            $currency_code   = $system_default_currency_info->code;
                                        }
                                    @endphp
                                    <a href="#">{{$currency_symbol}} {{$currency_code}}</a>
                                    <div class="header-menu">
                                        <ul>
                                            @foreach(\App\Models\Currency::where('status','active')->get() as $currency)
                                            <li><a href="javascript:;" onclick="currency_change('{{$currency['code']}}')">{{$currency->symbol}} {{ucfirst($currency->code)}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">English</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @auth
                                <li><a href="{{route('users.dashboard')}}">My account</a></li>
                                <li><a href="{{route('users.logout')}}">Logout</a></li>
                            @else
                            <li><a href="{{route('users.auth')}}" class="icon-user" >Sign in / Sign up</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{route('homes')}}" class="logo">
                    <img src="{{asset(get_setting('logo'))}}" alt="{{\App\Models\Settings::value('title')}}" width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{route('search')}}" method="GET">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control"  name="query" id="search_text" placeholder="Search product ..." >
                        </div>
                    </form>
                </div>
            </div>

            @auth
            <div class="header-right">
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                        <div class="icon">
                            <i class="icon-random"></i>
                        </div>
                        <p>Compare <span class="text-danger">({{\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->count()}})</span></p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                            <li class="compare-product">
                                <a href="{{route('product.details',$item->model->slug)}}">{{$item->name}}</a>                            </li>
                            @endforeach

                        </ul>

                        <div class="compare-actions">
                            <a href="#" class="action-link">Clear All</a>
                            <a href="{{route('compare')}}" id="compare_counter" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .compare-dropdown -->

                <div class="wishlist">
                    <a href="{{route('wishlist')}}" title="Wishlist" >
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge" id="wishlist_counter">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()}}</span>
                        </div>
                        <p>Wishlist</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count" id="cart_counter">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span>
                        </div>
                        <p>Cart</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="{{route('product.details',$item->model->slug)}}">{{$item->name}}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                                <span class="cart-product-qty">{{$item->qty}}</span>
                                                x ${{number_format($item->price,2)}}
                                            </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="{{$item->model->photo}}" alt="product">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove cart-delete" title="Remove Product" data-id="{{$item->rowId}}"><i class="icon-close"></i></a>
                            </div><!-- End .product -->
                            @endforeach

                            <div class="dropdown-cart-total">
                                <span>Sub total : </span>
                                 <span class="cart-total-price">$ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                            </div>

                        <div class="dropdown-cart-total">
                            <span>Coupon : </span>
                            @if(session()->has('coupon'))
                                <span class="ml-auto"> $ {{session('coupon')['value']}}</span>
                            @endif
                        </div>

                        <div class="dropdown-cart-total">
                            <span>Total : </span>
                            @if(session()->has('coupon'))
                                <span class="ml-auto"> {{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal()) - session('coupon')['value'],2)}}</span>
                            @else
                            <span class="cart-total-price">$ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                            @endif
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{route('cart')}}" class="btn btn-primary">View Cart</a>
                            <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div>
            @endauth

        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        Browse Categories <i class="icon-angle-down"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                <li class="item-lead"><a href="#">Daily offers</a></li>
                                <li class="item-lead"><a href="#">Gift Ideas</a></li>
                                <li><a href="#">Beds</a></li>
                                <li><a href="#">Lighting</a></li>
                                <li><a href="#">Sofas & Sleeper sofas</a></li>
                                <li><a href="#">Storage</a></li>
                                <li><a href="#">Armchairs & Chaises</a></li>
                                <li><a href="#">Decoration </a></li>
                                <li><a href="#">Kitchen Cabinets</a></li>
                                <li><a href="#">Coffee & Tables</a></li>
                                <li><a href="#">Outdoor Furniture </a></li>
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{route('homes')}}" class="">Home</a>
                        </li>
                        <li>
                            <a href="{{route('shop')}}" class="">Shop</a>

                        </li>
                        <li>
                            <a href="product.html" class="sf-with-ul">Product</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="menu-col">
                                            <div class="menu-title">Product Details</div><!-- End .menu-title -->
                                            <ul>
                                                <li><a href="product.html">Default</a></li>
                                                <li><a href="product-centered.html">Centered</a></li>
                                                <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                                <li><a href="product-gallery.html">Gallery</a></li>
                                                <li><a href="product-sticky.html">Sticky Info</a></li>
                                                <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                                <li><a href="product-fullwidth.html">Full Width</a></li>
                                                <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                            </ul>
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="banner banner-overlay">
                                            <a href="category.html">
                                                <img src="assets/images/menu/banner-2.jpg" alt="Banner">

                                                <div class="banner-content banner-content-bottom">
                                                    <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-sm -->
                        </li>
                        <li>
                            <a href="{{route('about.us')}}" class="">About us</a>
                        </li>
                        <li>
                            <a href="{{route('contact.us')}}" class="">Contact Us</a>
                        </li>
                        <li>
                            <a href="elements-list.html" class="sf-with-ul">Elements</a>
                            <ul>
                                <li><a href="elements-products.html">Products</a></li>
                                <li><a href="elements-typography.html">Typography</a></li>
                                <li><a href="elements-titles.html">Titles</a></li>
                                <li><a href="elements-banners.html">Banners</a></li>
                                <li><a href="elements-product-category.html">Product Category</a></li>
                                <li><a href="elements-video-banners.html">Video Banners</a></li>
                                <li><a href="elements-buttons.html">Buttons</a></li>
                                <li><a href="elements-accordions.html">Accordions</a></li>
                                <li><a href="elements-tabs.html">Tabs</a></li>
                                <li><a href="elements-testimonials.html">Testimonials</a></li>
                                <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                <li><a href="elements-portfolio.html">Portfolio</a></li>
                                <li><a href="elements-cta.html">Call to Action</a></li>
                                <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                            </ul>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->



</div>
