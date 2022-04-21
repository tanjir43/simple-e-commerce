@if(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->count() <=0)
    <p class="text-center ">You don't have any compare list</p>
@else
<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            <td class="">Product Image</td>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
                @php
                    $photo = explode(',',$item->model->photo);
                @endphp
                <td><a href="{{route('product.details',$item->model->slug)}}"><img src="{{asset($photo[0])}}"  alt=""></a></td>
            @endforeach
        </tr>
        <tr>
            <td class="">Product Name</td>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
               <td><a href="">{{$item->name}}</a></td>
            @endforeach
        </tr>
        <tr>
            <td class="">Product Price</td>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
               <td><a href="">{{Helper::currency_converter($item->price)}}</a></td>
            @endforeach
        </tr>
        <tr>
            <td class="">Product description</td>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
               <td><a href="">{!! $item->model->summary !!}</a></td>
            @endforeach
        </tr>
        <tr>
            <td class="">Product Brand</td>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
               <td><a href="">{{$item->model->brand['title'] }} </a></td>
            @endforeach
        </tr>
        <tr>
            <td class="">Product Category</td>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
               <td><a href="">{{$item->model->category['title']}} </a></td>
            @endforeach
        </tr>

        <tr>
            <td class="">Product availability</td>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
                @if($item->model->stock>0)
                    <td class="text-success">InStock</td>
                @else
                    <td class="text-danger">Out of stock</td>
                @endif
            @endforeach
        </tr>
    <tr>
        <td></td>
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item )
        <td>
            <div class="icon text-center">
            <a href="javascript:;"data-id="{{$item->rowId}}"class="mb-1 p-3 move-to-cart" title="add-to-cart"><i class="icon-shopping-cart"></i></a>
            <a href="javascript:;"data-id="{{$item->rowId}}"class="mb-1 p-3 move-to-wishlist" title="add-to wishlist"><i class="icon-heart-o"></i></a>
            <a href="javascript:;"data-id="{{$item->rowId}}"class="mb-1 p-3 delete-compare" title="delete"><i class="icon-close"></i></a>
            </div>

        </td>
        @endforeach


    </tr>


    </tbody>
    <thead>


</table><!-- End .table table-wishlist -->
@endif
