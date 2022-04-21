<?php

namespace App\Http\Controllers\forntend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartStore(Request  $request)
    {

        $product_qty = $request->input('product_qty');
        $product_id = $request->input('product_id');
        $product = Product::getProductByCart($product_id);
        $price = $product[0]['offer_price'];

        $cart_array = [];

        foreach (Cart::instance('shopping')->content() as $item) {
            $cart_array[] = $item->id;
        }
            $result = Cart::instance('shopping')->add($product_id, $product[0]['title'], $product_qty, $price)->associate('App\Models\Product');

            if ($result) {
                $response['status'] = true;
                $response['product_id'] = $product_id;
                $response['total'] = Cart::subtotal();
                $response['cart_count'] = Cart::instance('shopping')->count();
                $response['message']    = "Item was added to your cart";
            }
            if ($request->ajax()){
                $header =  view('frontend.includes.header')->render();
                $response['header'] = $header;
            }
            return json_encode($response);
    }

    public function cartDelete(Request $request){
        $id = $request->input('cart_id');
         Cart::instance('shopping')->remove($id);

            $response['status'] = true;
            $response['message']= 'Cart successfully removed';
            $response['total']  = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();

        if ($request->ajax()){
            $header = view('frontend.includes.header')->render();
            $response['header']= $header;
        }
        return json_encode($response);
    }

    public function cart(){
        return view('frontend.pages.cart.index');
    }

    public function update(Request $request, $rowId){
        Cart::instance('shopping')->update($rowId, $request->qty);
        return redirect()->back()->with('success','Cart product info updated successfully');
    }

    public function couponAdd(Request $request){
       $coupon = Coupon::where('code',$request->code)->first();

       if (!$coupon){
           return back()->with('errors','Invalid coupon code, Please enter valid coupon code');
       }
       if ($coupon){
           $total_price =(float)str_replace(',','',Cart::instance('shopping')->subtotal());
           session()->put('coupon',[
               'id' => $coupon->id,
               'code'=> $coupon->code,
               'value' => $coupon->discount($total_price),
           ]);
           return back()->with('success','Coupon applied successfully');
       }

    }

}
