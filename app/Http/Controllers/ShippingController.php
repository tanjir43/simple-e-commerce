<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShippingController extends Controller
{

    public function index()
    {
        $shippings = Shipping::orderBy('id','desc')->get();
        return view('backend.admin.shipping.manage',compact('shippings'));
    }


    public function create()
    {
        return view('backend.admin.shipping.create');
    }

    public function shippingStatus(Request $request){

        if ($request->mode=='true'){
            DB::table('shippings')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('shippings')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'shipping_address'  => 'string|required',
            'delivery_time'     => 'string|required',
            'delivery_charge'   => 'numeric|nullable',
            'status'            => 'nullable|in:active,inactive',
        ]);
        $data       = $request->all();

        $status = Shipping::create($data);
        if ($status){
            return redirect()->route('shipping.index')->with('success','Shipping created successfully');
        }
        else{
            return back()->with('errors','Something went wrong');
        }

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $shipping = Shipping::find($id);
        if ($shipping){
            return view('backend.admin.shipping.edit',compact('shipping'));
        }else{
            return back()->with('errors','Data not found');
        }
    }


    public function update(Request $request, $id)
    {
        $shipping = Shipping::find($id);
        if ($shipping){
            $this->validate($request,[
                'shipping_address'  => 'string|required',
                'delivery_time'     => 'string|required',
                'delivery_charge'   => 'numeric|nullable',
                'status'            => 'nullable|in:active,inactive',
            ]);
            $data       = $request->all();
            $status = $shipping->fill($data)->save();
            if ($status){
                return redirect()->route('shipping.index')->with('success','Shipping updated successfully');
            }
            else{
                return back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }

    public function destroy($id)
    {
        $shipping = Shipping::find($id);
        if ($shipping){
            $status = $shipping->delete();
            if ($status){
                return redirect()->route('shipping.index')->with('success','Shipping successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
