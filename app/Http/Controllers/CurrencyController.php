<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CurrencyController extends Controller
{

    public function currencyLoad(Request  $request){
        session()->put('currency_code',$request->currency_code);
        $currency = Currency::where('code',$request->currency_code)->first();
        session()->put('currency_symbol',$currency->symbol);
        session()->put('currency_exchange_rate',$currency->exchange_rate);
        $response['status'] = true;
        return $response;
    }
    public function index()
    {
        $currencies = Currency::orderBy('id','desc')->get();
        return view('backend.admin.currency.manage',compact('currencies'));
    }

    public function currencyStatus(Request $request){
        if ($request->mode=='true'){
            DB::table('currencies')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('currencies')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }
    public function create()
    {
        return view('backend.admin.currency.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'           => 'string|required',
            'symbol'         => 'string|required',
            'exchange_rate'  => 'numeric|nullable',
            'code'           => 'required',
            'status'         => 'nullable|in:active,inactive',
        ]);
        $data       = $request->all();
        $status = Currency::create($data);
        if ($status){
            return redirect()->route('currency.index')->with('success','Currency created successfully');
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
        $currency = Currency::find($id);
        if ($currency){
            return view('backend.admin.currency.edit',compact('currency'));
        }else{
            return back()->with('errors','Data not found');
        }
    }

    public function update(Request $request, $id)
    {
        $currency = Currency::find($id);
        if ($currency){
            $this->validate($request,[
                'name'           => 'string|required',
                'symbol'         => 'string|required',
                'exchange_rate'  => 'numeric|nullable',
                'code'           => 'required',
                'status'         => 'nullable|in:active,inactive',
            ]);
            $data       = $request->all();
            $status = $currency->fill($data)->save();
            if ($status){
                return redirect()->route('currency.index')->with('success','Currency updated successfully');
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
        $currency = Currency::find($id);
        if ($currency){
            $status = $currency->delete();
            if ($status){
                return redirect()->route('currency.index')->with('success','Currency successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
