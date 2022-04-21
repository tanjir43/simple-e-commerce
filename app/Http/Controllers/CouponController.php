<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('backend.admin.coupon.manage',compact('coupons'));
    }

    public function couponStatus(Request $request){
        if ($request->mode=='true'){
            DB::table('coupons')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('coupons')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }

    public function create()
    {
        return view('backend.admin.coupon.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'code'   => 'required|min:2',
            'type'  => 'required|in:fixed,percent',
            'status'=> 'required|in:active,inactive',
            'value' => 'required|numeric'
        ]);
        $data = $request->all();
        $status = Coupon::create($data);
        if ($status){
            return redirect()->route('coupon.index')->with('success','Coupon created successfully');
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

        $coupon = Coupon::find($id);
        if ($coupon){
            return view('backend.admin.coupon.edit',compact('coupon'));
        }else{
            return back()->with('errors','Data not found');
        }
    }


    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        if ($coupon){
            $this->validate($request,[
                'code'   => 'required|min:2',
                'type'  => 'required|in:fixed,percent',
                'status'=> 'required|in:active,inactive',
                'value' => 'required|numeric'
            ]);
            $data       = $request->all();
            $status = $coupon->fill($data)->save();
            if ($status){
                return redirect()->route('coupon.index')->with('success','Coupon updated successfully');
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
        $coupon = Coupon::find($id);
        if ($coupon){
            $status = $coupon->delete();
            if ($status){
                return redirect()->route('coupon.index')->with('success','Coupon successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
