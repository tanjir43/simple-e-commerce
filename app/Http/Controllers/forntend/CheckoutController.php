<?php

namespace App\Http\Controllers\forntend;

use App\Http\Controllers\Controller;

use App\Http\Controllers\PaypalController;
use App\Http\Controllers\RazorpayController;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout1(){
        $user = Auth::user();
        return view('frontend.pages.checkout.checkout1',compact('user'));
    }


    public function checkout1Store(Request $request){
        Session::put('checkout',[
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'country'    => $request->country,
            'city'       => $request->city,
            'address'       => $request->address,
            'postcode'    => $request->postcode,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'note'      => $request->note,
            'state'      => $request->state,
            'sstate'      => $request->sstate,
            'sfirst_name' => $request->sfirst_name,
            'slast_name'  => $request->slast_name,
            'scountry'    => $request->scountry,
            'scity'       => $request->scity,

            'spostcode'   => $request->spostcode,


            'sphone'      => $request->sphone,
            'semail'      => $request->semail,
            'sub_total'   => $request->sub_total,
            'total_amount'=> $request->total_amount,
        ]);

        $shippings = Shipping::where('status','active')->orderBy('shipping_address','asc')->get();
        return view('frontend.pages.checkout.checkout2',compact('shippings'));
    }

    public function checkout2Store(Request $request){
        $this->validate($request,[
            'delivery_charge' => 'required|numeric'
        ]);
        Session::push('checkout',[
            'delivery_charge' => $request->delivery_charge,
        ]);
        return view('frontend.pages.checkout.checkout3');
    }

    public function checkout3Store(Request $request){
        $this->validate($request,[
            'payment_method' => 'string|required',
            'payment_status' => 'string|in:paid,unpaid'
        ]);
//        return $request->all();
        Session::push('checkout',[
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid'
        ]);

        return view('frontend.pages.checkout.review');
    }

    public function checkoutStore(){

            $order = new Order();
    $order['user_id'] = auth()->user()->id;
    $order['order_number'] = Str::upper('ORD-'.Str::random(8));

//    $order['sub_total']    = Session::get('checkout')['sub_total'];
    if (Session::has('coupon')){
        $order['coupon'] = Session::get('coupon')['value'];
    }else{
        $order['coupon'] = 0;
    }
//    $order['total_amount']    = Session::get('checkout')['sub_total']+(float)str_replace(',','',Session::get('checkout')[0]['delivery_charge']);
    $order['total_amount'] =(float)str_replace(',','', \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())+Session::get('checkout')[0]['delivery_charge']-$order['coupon'];
    $order['payment_status'] = Session::get('checkout')['1']['payment_status'];
    $order['payment_method'] = Session::get('checkout')['1']['payment_method'];
    $order['condition']     = 'pending';
    $order['delivery_charge'] = Session::get('checkout')['0']['delivery_charge'];
    $order['first_name'] = Session::get('checkout')['first_name'];
    $order['last_name'] = Session::get('checkout')['last_name'];
    $order['email'] = Session::get('checkout')['email'];
    $order['address'] = Session::get('checkout')['address'];
    $order['phone'] = Session::get('checkout')['phone'];
    $order['country'] = Session::get('checkout')['country'];
    $order['city'] = Session::get('checkout')['city'];
    $order['note'] = Session::get('checkout')['note'];
    $order['state'] = Session::get('checkout')['state'];
    $order['sstate'] = Session::get('checkout')['sstate'];
    $order['sfirst_name'] = Session::get('checkout')['sfirst_name'];
    $order['slast_name'] = Session::get('checkout')['slast_name'];
    $order['semail'] = Session::get('checkout')['semail'];
    $order['sphone'] = Session::get('checkout')['sphone'];
    $order['scountry'] = Session::get('checkout')['scountry'];
    $order['scity'] = Session::get('checkout')['scity'];


      $status = $order->save();

      if ( $status){
          session()->put('order_id',$order->id);
      }

      foreach (Cart::instance('shopping')->content() as  $item){
          $product_id[] = $item->id;
          $product = Product::find($item->id);
          $quantity = $item->qty;
          $order->products()->attach($product,['quantity' => $quantity]);
      }
        if ($order['payment_method'] == 'paypal'){
            $paypal =new PaypalController;
            return $paypal->getCheckout();
        }elseif ($order['payment_method']=='razor'){
            $razor = new RazorpayController;
            return $razor->razorpay();
        }

    if ($status){
        Mail::to($order['email'])->bcc($order['semail'])->cc('barfitanjir@gmail.com')->send(new OrderMail($order));

        Cart::instance('shopping')->destroy();
        Session::forget('coupon');
        Session::forget('checkout');
        return redirect()->route('users.complete',$order['order_number']);
    }
    else{
        return redirect()->route('checkout1')->with('errors','Something went wrong');
     }
    }
    public function checkout_done($order_id,$payment){
        $order  = Order::findOrFail($order_id);
        $order->payment_status = 'paid';
        $order->payment_details = $payment;
        $status =$order->save();

        if ($status){
            Mail::to($order['email'])->bcc($order['semail'])->cc('barfitanjir@gmail.com')->send(new OrderMail($order));

            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            Session::forget('checkout');
            return redirect()->route('users.complete',$order['order_number']);
        }
    }

    public function razorPaymentDone($order_id,$payment){
        $order  = Order::findOrFail($order_id);
        $order->payment_status = 'paid';
        $order->payment_details = $payment;
        $status =$order->save();

        if ($status){
            Mail::to($order['email'])->bcc($order['semail'])->cc('barfitanjir@gmail.com')->send(new OrderMail($order));

            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            Session::forget('checkout');
            return redirect()->route('users.complete',$order['order_number']);
        }
    }

    public function completeCheckout($order){

        return view('frontend.pages.checkout.complete',compact('order'));
}

}
