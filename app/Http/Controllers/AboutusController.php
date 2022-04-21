<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;


class AboutusController extends Controller
{
    public function index()
    {
        $about_us = AboutUs::orderBy('id','desc')->get();
        return view('backend.admin.about_us.manage',compact('about_us'));
    }


    public function create()
    {
        return view('backend.admin.about_us.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'photo'          => 'required',
            'full_name'      => 'string|required',
            'designation'    => 'string|required',
        ]);
        $data       = $request->all();
        $status = AboutUs::create($data);
        if ($status){
            return redirect()->route('about_us.index')->with('success','New about created successfully');
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
        $about_us = AboutUs::find($id);
        if ($about_us){
            return view('backend.admin.about_us.edit',compact('about_us'));
        }else{
            return back()->with('errors','Data not found');
        }
    }


    public function update(Request $request, $id)
    {
        $about_us = AboutUs::find($id);
        if($about_us){
            $this->validate($request,[
                'photo'          => 'nullable',
                'full_name'      => 'string|nullable',
                'designation'    => 'string|nullable',
            ]);
            $data       = $request->all();
            $status = $about_us->fill($data)->save();
            if ($status){
                return redirect()->route('about_us.index')->with('success','About updated successfully');
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
        $about_us = AboutUs::find($id);
        if ($about_us){
            $status = $about_us->delete();
            if ($status){
                return redirect()->route('about_us.index')->with('success','About successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
