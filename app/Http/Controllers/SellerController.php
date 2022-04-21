<?php

namespace App\Http\Controllers;


use App\Models\Banner;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{

    public function index()
    {
        $sellers = Seller::orderBy('id','DESC')->get();
        return view('backend.admin.seller.manage',compact('sellers'));

    }

    public function sellerStatus(Request $request){
        if ($request->mode=='true'){
            DB::table('sellers')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('sellers')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }

    public function sellerVerified(Request $request){
        if ($request->mode=='true'){
            DB::table('sellers')->where('id',$request->id)->update(['is_verified'=>1]);
        }
        else{
            DB::table('sellers')->where('id',$request->id)->update(['is_verified'=>0]);
        }
        return  response()->json(['msg'=>'Successfully updated ','status'=>true]);

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
        //
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
        //
    }
}
