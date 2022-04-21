<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.admin.categories.manage',compact('categories'));
    }

    public function create()
    {
        $parent_cats = Category::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('backend.admin.categories.create',compact('parent_cats'));
    }

    public function categoryStatus(Request $request){
//      dd($request->all());
        if ($request->mode=='true'){
            DB::table('categories')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('categories')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }


    public function store(Request $request)
    {

            $this->validate($request,[
                'title'     => 'string|required',
                'summary'   => 'string|nullable',
                'photo'     => 'nullable',
                'is_parent' => 'sometimes|in:1',
                'parent_id' => 'nullable|exists:categories,id',
                'status'    => 'nullable|in:active,inactive'
            ]);
            $data       = $request->all();
            $slug       = Str::slug($request->input('title'));
            $slug_count = Category::where('slug',$slug)->count();
            if ($slug_count>0){
                $slug   = time().'-'.$slug;
            }
            $data['slug'] = $slug;
             if($request->is_parent == 1){
            $data['parent_id']  = null;
          }
          $data['is_parent'] = $request->input('is_parent', 0);

            $status = Category::create($data);
            if ($status){
                return redirect()->route('category.index')->with('success','Category added successfully');
            }
            else{
                return  back()->with('errors','Something went wrong');
            }


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $parent_cats = Category::where('is_parent',1)->orderBy('title','ASC')->get();

        if ($category){
            return view('backend.admin.categories.edit',compact(['category','parent_cats']));
        }else{
            return back()->with('errors','Category not found');
        }
    }

    public function update(Request $request, $id)
    {
            $category = Category::find($id);
            if ($category){
                $this->validate($request,[
                    'title'     => 'string|required',
                    'summary'   => 'string|nullable',
                    'photo'     => 'nullable',
                    'is_parent' => 'sometimes|in:1',
                    'parent_id' => 'nullable|exists:categories,id',
                    'status'    => 'nullable|in:active,inactive'
                ]);
                $data       = $request->all();
//                if ($request->is_parent==1){
//                    $data['parent_id']= null;
//                }

                if($request->is_parent == 1){
                    $data['parent_id']  = null;
                }
                $data['is_parent'] = $request->input('is_parent',0);
                $status = $category->fill($data)->save();
                if ($status){
                    return redirect()->route('category.index')->with('success','Category updated successfully');
                }
                else{
                    return  back()->with('errors','Something went wrong');
                }
            }else{
                return back()->with('errors','Something went wrong');
            }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $child_cat_id = Category::where('parent_id',$id)->pluck('id');
         if ($category){
            $status = $category->delete();
            if ($status){
                if (count($child_cat_id)>0){
                    Category::shiftChild($child_cat_id);
                }
                return redirect()->route('category.index')->with('success','Category delete successfully');
            }else{
                return back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }

    public function getChildByParentID(Request $request, $id){
        $category = Category::find($request->id);
        if ($category){
            $child_id = Category::getChildByParentID($request->id);
            if (count($child_id)<=0){
                return response()->json(['status'=> false,'data'=>null ,'msg'=>'']);
            }
            return response()->json(['status'=> true, 'data'=>$child_id, 'msg'=>'']);
        }else{
            return response()->json(['status'=> false,'data'=>null ,'msg'=>'Category not found']);

        }

    }
}



























