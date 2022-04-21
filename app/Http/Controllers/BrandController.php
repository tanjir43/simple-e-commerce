<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.admin.brand.manage',compact('brands'));
    }

    public function create()
    {
        return view('backend.admin.brand.create');
    }

    public function brandStatus(Request $request){
        if ($request->mode == 'true'){
            DB::table('brands')->where('id',$request->id)->update(['status'=>'active']);
        }else{
            DB::table('brands')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'          => 'string|required',
            'photo'          => 'nullable',
            'status'         => 'nullable|in:active,inactive',
        ]);
        $data       = $request->all();
        $slug       = Str::slug($request->input('title'));
        $slug_count =  Brand::where('slug',$slug)->count();
        if ($slug_count>0){
            $slug   = time().$slug;
        }
        $data['slug'] = $slug;

        $status = Brand::create($data);
        if ($status){
            return redirect()->route('brand.index')->with('success','Brand created successfully');
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
        $brand = Brand::find($id);
        if ($brand){
            return view('backend.admin.brand.edit',compact('brand'));
        }else{
            return back()->with('errors','Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if ($brand){
            $this->validate($request,[
                'title'          => 'string|required',
                'photo'          => 'nullable',
                'status'         => 'nullable|in:active,inactive',
            ]);
            $data       = $request->all();

            $status = $brand->fill($data)->save();
            if ($status){
                return redirect()->route('brand.index')->with('success','Brand updated successfully');
            }
            else{
                return back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Something went wrong');
        }

    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        if ($brand){
            $status = $brand->delete();
            if ($status){
                return redirect()->route('brand.index')->with('success','Brand successfully deleted');
            }else{
                return back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
