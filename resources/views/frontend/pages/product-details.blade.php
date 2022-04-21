@extends('frontend.master')
@section('title')
bla bla
@endsection

@section('style')
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection

@section('body')

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    @php
                                    $photos = explode(',',$product->photo)
                                    @endphp

                                        <figure class="product-main-image ">
                                            <img id="product-zoom" src="{{$photos[0]}}" data-zoom-image="{{$photos[0]}}" alt="{{$product->title}}">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        @php
                                            $photos = explode(',',$product->photo)
                                        @endphp
                                        @foreach($photos as $key=>$photo)
                                            <a class="product-gallery-item {{$key== 0 ?'active' : ''}} " href="#" data-image="{{$photo}}" data-zoom-image="{{$photo}}">
                                                <img src="{{$photo}}" alt="product side">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{$product->title}}</h1>

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div>
                                    </div>
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div>

                                <div class="product-price">
                                  $  {{number_format($product->offer_price,2)}}  <small class="text-black-50 ml-3"><del>${{number_format($product->price,2)}}</del></small>
                                </div>

                                <div class="product-content">
                                    <p>{{$product->summary}}</p>
                                </div>

{{--                                <div class="details-filter-row details-row-size">--}}
{{--                                    <label>Color:</label>--}}

{{--                                    <div class="product-nav product-nav-thumbs">--}}
{{--                                        <a href="#" class="active">--}}
{{--                                            <img src="{{asset('/')}}assets/images/products/single/1-thumb.jpg" alt="product desc">--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <img src="{{asset('/')}}assets/images/products/single/2-thumb.jpg" alt="product desc">--}}
{{--                                        </a>--}}
{{--                                    </div><!-- End .product-nav -->--}}
{{--                                </div><!-- End .details-filter-row -->--}}

                                <div class="details-filter-row details-row-size">
                                    <label for="size">Size:</label>
                                    @php
                                    $product_attr = \App\Models\ProductAttribute::where('product_id',$product->id)->get();
                                    @endphp
                                    <div class="select-custom">
                                        <select name="size" id="size" class="form-control">
                                            <option value="#" selected="selected">Select a size</option>
                                        @foreach($product_attr as $size)
                                                <option value="{{$size->size}}">{{$size->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>

{{--                                    <a href="#" class="size-guide"><i clsass="icon-th-list"></i>size guide</a>--}}
                                </div>

                                <div class="details-filter-row details-row-size">
                                   <div class="sizeguide">
                                       <h6>Size guide</h6>
                                       <div class="size_guide_thumb d-flex">
                                           @php
                                           $size_guide = explode(',',$product->size_guide);
                                           @endphp
                                           @foreach($size_guide as $sg)
{{--                                               <img src="{{$sg}}" height="50" width="50" alt="">--}}
                                               <a class="size-guide_img d-flex" href="{{$sg}}" style="background-image:url({{$sg}}) ; width: 100px" ><img
                                                       src="{{$sg}}" alt=""></a>
                                           @endforeach
                                       </div>
                                   </div>
                                </div>

                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div>
                                </div>

                                <div class="product-details-action">
                                    <a href=" " class="btn-product btn-cart"><span>add to cart</span></a>

                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>>
                </div>

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link " id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  active" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ({{\App\Models\ProductReview::where('product_id',$product->id)->count()}})</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade  " id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Information</h3>
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <h3>Information</h3>
                                {{$product->additional_info}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <h3>Delivery & returns</h3>
                                {{$product->return_cancellation}}
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                            <div class="reviews">
                                <div class="review">
                                    @auth()
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-12">
                                                <h5><strong>Submit a review</strong></h5>
                                                <form action="  {{route('product.review',$product->slug)}}" method="post">
                                                    @csrf
                                                <p><strong>Your ratings</strong></p>
                                                <div class="rating" >
                                                    <div class="ratings-v" style="width: 100%;"></div><!-- End .ratings-val -->
                                                    <input type="radio" name="rate" class="fas fa-star" id="star-1" value="1">
                                                    <label class="star-1" for="star-1">1</label>


                                                    <input type="radio" name="rate" class="star" id="star-2" value="2">
                                                    <label class="star-2" for="star-2">2</label>

                                                    <input type="radio" name="rate" class="star" id="star-3" value="3">
                                                    <label class="star-3" for="star-3">3</label>

                                                    <input type="radio" name="rate" class="star" id="star-4" value="4">
                                                    <label class="star-4" for="star-4">4</label>

                                                    <input type="radio" name="rate" class="star" id="star-5" value="5">
                                                    <label class="star-5" for="star-5">5</label>
                                                </div>
                                                    @error('rate')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror

                                                <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}">
                                                <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                                                <p><strong>Reason for your rating</strong></p>
                                                <select name="reason" class="form-control">
                                                    <option value="quality" {{old('reason') == 'quality' ? 'selected' : ''}}>Quality</option>
                                                    <option value="value"   {{old('reason') == 'value'   ? 'selected' : ''}}>Value</option>
                                                    <option value="design"  {{old('reason') == 'design'  ? 'selected' : ''}}>Design</option>
                                                    <option value="price"   {{old('reason') == 'price'   ? 'selected' : ''}}>Price</option>
                                                    <option value="others"  {{old('reason') == 'others'  ? 'selected' : ''}}>Others</option>
                                                </select>
                                                    @error('reason')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                <p><strong>Comments</strong></p>
                                                <textarea name="review" class="form-control" placeholder="comment"></textarea>
                                                    @error('review')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                <button type="submit" class="btn btn-outline-success">SUBMIT REVIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <p class="py-5">You need to login to submit a review <a class="text-info" href="{{route('users.auth')}}">click here!</a> to login</p>
                                    @endif
                                </div>
                                <h3 class="text-danger">Total Reviews ({{\App\Models\ProductReview::where('product_id',$product->id)->count()}})</h3>
                                <div class="review">
                                    @php
                                        $reviews= \App\Models\ProductReview::where('product_id',$product->id)->latest()->paginate(10);
                                    @endphp
                                    @if(count($reviews)>0)
                                        @foreach($reviews as $review)
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{\App\Models\User::where('id',$review->user_id)->value('full_name')}}</a></h4>
                                                <div class="ratings-container">

                                                    {{$review->rate}} <p class="text-danger">*</p>
{{--                                                    @for($i=0; $i<5; $i++)--}}
{{--                                                        @if($review->rate>$i)--}}
{{--                                                            <i class="far fa-star" aria-hidden="true"></i>--}}
{{--                                                        @else--}}
{{--                                                            <i class="far fa-star" aria-hidden="true"></i>--}}
{{--                                                        @endif--}}
{{--                                                    @endfor--}}
{{--                                                    <div class="ratings">--}}
{{--                                                        <div class="ratings-val" style="width: 80%;"></div>--}}
{{--                                                    </div>--}}
                                                </div>

                                                <span class="review-date">{{\Carbon\Carbon::parse(($review->created_at)->format('M d y'))}}</span>
                                            </div>
                                            <div class="col">
                                                <h4>{{ucfirst($review->reason)}}</h4>

                                                <div class="review-content">
                                                    <p>{{$review->review}}</p>
                                                </div>
                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                    {{$reviews->links('vendor.pagination.custom')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                     data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                    @if(count($product->rel_product)>0)
                        @foreach($product->rel_product as $rel_prod)

                            @if($rel_prod->id != $product->id)
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">{{$rel_prod->conditions}}</span>
                                        @php
                                            $photos = explode(',',$rel_prod->photo)
                                        @endphp
                                        <a href="{{route('product.details',$rel_prod->slug)}}">
                                            <img src="{{$photos[0]}}" alt="{{$rel_prod->title}}" class="product-image">
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
                                            <a href="#">{{\App\Models\Category::where('id',$rel_prod->cat_id)->value('title')}}</a>
                                        </div>
                                        <h3 class="product-title"><a href="{{route('product.details',$rel_prod->slug)}}">{{$rel_prod->title}}</h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $ {{number_format($rel_prod->offer_price,2)}} <small class="ml-3 text-black-50"><del>$ {{number_format($rel_prod->price,2)}}</del></small>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div>
                                            </div>
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection


{{--<input type="radio" name="rate" class="star" id="star-1">--}}
{{--<label class="star-1" for="star-1">1</label>--}}

{{--<input type="radio" name="rate" class="star" id="star-2">--}}
{{--<label class="star-2" for="star-2">2</label>--}}

{{--<input type="radio" name="rate" class="star" id="star-3">--}}
{{--<label class="star-3" for="star-3">3</label>--}}

{{--<input type="radio" name="rate" class="star" id="star-4">--}}
{{--<label class="star-4" for="star-4">4</label>--}}

{{--<input type="radio" name="rate" class="star" id="star-5">--}}
{{--<label class="star-5" for="star-5">5</label>--}}
