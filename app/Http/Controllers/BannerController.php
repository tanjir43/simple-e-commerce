<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::orderBy('id','desc')->get();
        return view('backend.admin.banner.manage',compact('banners'));
    }


    public function create()
    {
        return view('backend.admin.banner.create');
    }

    public function bannerStatus(Request $request){
//      dd($request->all());
        if ($request->mode=='true'){
            DB::table('banners')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('banners')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'title'          => 'string|required',
            'slug'           => 'string|required|unique:banners,slug',
            'description'    => 'string|nullable',
            'photo'          => 'required',
            'condition'      => 'nullable|in:banner,promo',
            'status'         => 'nullable|in:active,inactive',
        ]);
        $data       = $request->all();
        $slug       = Str::slug($request->input('title'));
        $slug_count =  Banner::where('slug',$slug)->count();
        if ($slug_count>0){
            $slug   = time().$slug;
        }
        $data['slug'] = $slug;

        $status = Banner::create($data);
        if ($status){
            return redirect()->route('banner.index')->with('success','Banner created successfully');
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
        $banner = Banner::find($id);
        if ($banner){
            return view('backend.admin.banner.edit',compact('banner'));
        }else{
            return back()->with('errors','Data not found');
        }
    }


    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if ($banner){
            $this->validate($request,[
                'title'          => 'string|required',
                'slug'           => 'string|required|exists:banners,slug',
                'description'    => 'string|nullable',
                'photo'          => 'required',
                'condition'      => 'nullable|in:banner,promo',
                'status'         => 'nullable|in:active,inactive',
            ]);
            $data       = $request->all();
            $status = $banner->fill($data)->save();
            if ($status){
                return redirect()->route('banner.index')->with('success','Banner updated successfully');
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
        $banner = Banner::find($id);
        if ($banner){
            $status = $banner->delete();
            if ($status){
                return redirect()->route('banner.index')->with('success','Banner successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
