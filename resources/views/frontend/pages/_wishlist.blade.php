<table class="table table-wishlist table-mobile">

    <thead>
    @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()>0)
    <tr>
        <th>Product</th>
        <th >Price</th>
        <th class="text-center">Add to Cart</th>
        <th class="text-center">Delete</th>
    </tr>
    </thead>

    <tbody>

        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
            <tr>
                <td class="product-col">
                    <div class="product">
                        <figure class="product-media">
                            <a href="{{route('product.details',$item->model->slug)}}">
                                <img src="{{$item->model->photo}}" alt="Product image">
                            </a>
                        </figure>

                        <h3 class="product-title">
                            <a href="{{route('product.details',$item->model->slug)}}">{{$item->name}}</a>
                        </h3>
                    </div>
                </td>
                <td class="price-col">$ {{number_format($item->price,2)}}</td>

                <td class="action-col">
                    <a href="javascript:void(0);" data-id="{{$item->rowId}}" class="move-to-cart btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</a>
                </td>
                <td class="remove-col"><button class="btn-remove"><i class="icon-close delete_wishlist" data-id="{{$item->rowId}}"></i></button></td>
            </tr>
        @endforeach
    @else
            <tr>
            <td>
                <p class="text-center"><strong>You don't have any wishlist</strong></p>
            </td>
            </tr>


    @endif

    </tbody>
</table><!-- End .table table-wishlist -->
