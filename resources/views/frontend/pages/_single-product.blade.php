@if(count($products)>0)

    @foreach($products as $item)

{{--        modal--}}
<div class="modal fade" id="quickview{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php
                    $photo = explode(',',$item->photo)
                @endphp
                <span class=><img src="{{$item->photo}}" alt=""></span>
            </div>
        </div>
    </div>
</div>


<div class="col-6 col-md-4 col-lg-4 col-xl-3">
            <div class="product">
                @php
                    $photo = explode(',',$item->photo)
                @endphp
                <figure class="product-media">
                    <span class="product-label label-new">{{$item->conditions}}</span>
                    <a href="{{route('product.details',$item->slug)}}">
                        <img src="{{$photo[0]}}" alt="{{$item->title}}" class="product-image">
                    </a>
                    <div class="product-action-vertical">
                        <a href="javascript:void(0)" class="add_to_wishlist btn-product-icon btn-wishlist btn-expandable" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><span>add to wishlist</span></a>
                    </div><!-- End .product-action -->

                    <div class="product-action action-icon-top">
                        <a href="#" data-quantity="1" data-product-id="{{$item->id}}" id="add_to_cart{{$item->id}}"  class="add_to_cart btn-product btn-cart btn-sm"></a>

                        <a href="#" class="btn-product btn-quickview"data-toggle="modal" data-target="#quickview{{$item->id}}"  title="Quick view"><span>quick view</span></a>
                        <a href="javascript:void(0);" class="btn-product btn-compare add_to_compare" data-id="{{$item->id}}"id="add_to_compare{{$item->id}}" title="Compare"><span>compare</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">{{\App\Models\Category::where('id',$item->cat_id)->value('title')}}</a>
                        <a href="#" class="float-right ">{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</a>
                    </div>


                    <h3 class="product-title"><a href="{{route('product.details',$item->slug)}}">{{ucfirst($item->title)}}</a></h3>
                    <div class="product-price">
                         {{Helper::currency_converter($item->offer_price)}} <small class="text-black-50 ml-3"><del>{{Helper::currency_converter($item->price)}}</del></small>
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div>
                        </div>
                        <span class="ratings-text">( 11 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endif


