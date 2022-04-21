<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function  index(){
        $orders = Order::orderBy('id','DESC')->get();
        return view('backend.admin.order.index',compact('orders'));
    }

public function orderStatus(Request  $request){
        $order = Order::find($request->input('order_id'));
        if ($order){
            if ($request->input('condition'=='delivered')){
                foreach ($order->products as $item){
                    $product = Product::where('id',$item->pivot->product_id)->first();
                    $stock =$product->stock;
                    $stock -= $item->pivot->quantity;
                    $product->update(['stock'=>$stock]);
                    Order::where('id',$request->input('order_id'))->update(['payment_status'=>'paid']);
                }
            }
            $status =Order::where('id',$request->input('order_id'))->update(['condition'=>$request->input('condition')]);
            if ($status){
                return back()->with('success','Order Successfully updated');
            }else{
                return back()->with('errors','Something went wrong');
            }
        }

}
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $order = Order::find($id);
        if ($order){
            return view('backend.admin.order.show',compact('order'));
        }else{
        abort(404);
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }



    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order){
            $status = $order->delete();
            if ($status){
                return redirect()->route('order.index')->with('success','Order successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
