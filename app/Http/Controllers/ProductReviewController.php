<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{

    public function productReview(Request $request){
        $this->validate($request,[
            'rate' =>'required|numeric',
            'reason' => 'nullable|string',
            'review'    => 'nullable|string'
        ]);
        $data = $request->all();
        $status = ProductReview::create($data);
        if ($status){
            return back()->with('success','Thanks for your feedback');
        }else{
            return back()->with('errors','Please try again');
        }
    }
    public function index()
    {
        //
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
