<?php

namespace App\Http\Controllers\forntend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compare(){
        return view('frontend.pages.compare');
    }

    public function compareStore(Request $request){
        $product_id = $request->input('product_id');

        $product = Product::getProductByCart($product_id);
        $price= $product[0]['offer_price'];
        $compare_array = [];
        foreach (Cart::instance('compare')->content() as $item){
            $compare_array[] = $item->id;
        }
        if (in_array($product_id,$compare_array)){
            $response['present'] = true;
            $response['message'] = "Item is already in your compare";
        }elseif (count($compare_array)>=4){
            $response['status'] = false;
            $response['message']= "You can't add more than 4 items";
        }
        elseif($product[0]['stock']<=0){
            $response['status'] = false;
            $response['message']= "We don't have enough items";
        }
        else{
            $result = Cart::instance('compare')->add($product_id, $product[0]['title'],1,$price)->associate('App\Models\Product');
            if ($result){
                $response['status']  = true;
                $response['message'] = "Item has been saved in your Compare list";
                $response['compare_count'] = Cart::instance('compare')->count();
            }
        }
        return json_encode($response);
    }

    public function moveToCart(Request $request){
        $item = Cart::instance('compare')->get($request->input('rowId'));

        Cart::instance('compare')->remove($request->input('rowId'));
        $result = Cart::instance('shopping')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Product');
        if ($result){
            $response['status'] = true;
            $response['message']= "Item has been moved to cart";
            $response['compare_count'] = Cart::instance('compare')->count();
            $response['cart_count']     = Cart::instance('shopping')->count();
        }
        if ($request->ajax()){
            $wishlist  = view('frontend.pages._wishlist')->render();
            $compare = view('frontend.pages._compare')->render();
            $header = view('frontend.includes.header')->render();
            $response['wishlist_list'] = $wishlist;
            $response['compare_list'] = $compare;
            $response['header']=$header;
        }
        return $response;
    }
    public function moveToWishlist(Request $request){
        $item = Cart::instance('compare')->get($request->input('rowId'));

        Cart::instance('compare')->remove($request->input('rowId'));
        $result = Cart::instance('wishlist')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Product');
        if ($result){
            $response['status'] = true;
            $response['message']= "Item has been moved to wishlist";

        }
        if ($request->ajax()){
            $wishlist  = view('frontend.pages._wishlist')->render();
            $compare = view('frontend.pages._compare')->render();

            $header = view('frontend.includes.header')->render();
            $response['wishlist_list'] = $wishlist;
            $response['compare_list'] = $compare;

            $response['header']=$header;
        }
        return $response;
    }

    public function compareDelete(Request  $request){
        $id = $request->input('rowId');
        Cart::instance('compare')->remove($id);

        $response['status']  = true;
        $response['message'] = "Item successfully removed from your compare";
        $response['cart_count'] = Cart::instance('shopping')->count();
        $response['compare_count'] = Cart::instance('compare')->count();

        if ($request->ajax()){
            $compare = view('frontend.pages._compare')->render();
            $wishlist = view('frontend.pages._wishlist')->render();
            $header   = view('frontend.includes.header')->render();
            $response['compare_list'] = $compare;
            $response['wishlist_list'] = $wishlist;
            $response['header']  = $header;
        }

        return $response;
    }
}
