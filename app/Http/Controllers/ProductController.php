<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('backend.admin.product.manage',compact('products'));
    }

    public function productStatus(Request $request){
//      dd($request->all());
        if ($request->mode=='true'){
            DB::table('products')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('products')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return  response()->json(['msg'=>'Successfully updated status','status'=>true]);

    }

    public function create()
    {
        return view('backend.admin.product.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'         => 'string|required',
            'summary'       => 'string|required',
            'description'   => 'string|nullable',
            'return_cancellation'  => 'string|nullable',
            'additional_info'      => 'string|nullable',
            'stock'         => 'nullable',
            'price'         => 'nullable|numeric',
            'discount'      => 'nullable|numeric',
            'photo'         => 'required',
            'size_guide'    => 'nullable',
            'cat_id'        => 'required|exists:categories,id',
            'child_cat_id'  => 'nullable|exists:categories,id',
            'size'          => 'nullable',
            'conditions'    => 'nullable',
            'status'        => 'nullable|in:active,inactive',
        ]);
        $data       = $request->all();
        $slug       = Str::slug($request->input('title'));
        $slug_count =  Product::where('slug',$slug)->count();
        if ($slug_count>0){
            $slug   = time().$slug;
        }
        $data['slug'] = $slug;
        $data['offer_price']  = ($request->price-(($request->price*$request->discount)/100));
//        return $data;
        $status = Product::create($data);
        if ($status){
            return redirect()->route('product.index')->with('success','Product created successfully');
        }
        else{
            return back()->with('errors','Something went wrong');
        }

    }


    public function show($id)
    {
        $product= Product::find($id);
        $productAttr = ProductAttribute::where('product_id',$id)->orderBy('id','DESC')->get();
        if ($product){
            return view('backend.admin.product.product-attribute',compact(['product','productAttr']));
        }
        else{
            return  back()->with('errors','Product not found');
        }

    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product){
            return view('backend.admin.product.edit',compact('product'));
        }else{
            return back()->with('errors','Product not found');
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product){
            $this->validate($request,[
                'title'         => 'string|required',
                'summary'       => 'string|required',
                'description'   => 'string|nullable',
                'return_cancellation'  => 'string|nullable',
                'additional_info'      => 'string|nullable',
                'stock'         => 'nullable',
                'price'         => 'nullable|numeric',
                'discount'      => 'nullable|numeric',
                'photo'         => 'required',
                'size_guide'    => 'nullable',
                'cat_id'        => 'required|exists:categories,id',
                'child_cat_id'  => 'nullable|exists:categories,id',
                'size'          => 'nullable',
                'conditions'    => 'nullable',
                'status'        => 'nullable|in:active,inactive',
            ]);
            $data       = $request->all();

            $data['offer_price']  = ($request->price-(($request->price*$request->discount)/100));

            $status = $product->fill($data)->save();
            if ($status){
                return redirect()->route('product.index')->with('success','Product updated successfully');
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
        $product = Product::find($id);
        if ($product){
            $status = $product->delete();
            if ($status){
                return redirect()->route('product.index')->with('success','Product successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }

    public function addProductAttribute(Request $request,$id){
        $data = $request->all();


        foreach($data['original_price'] as $key=>$val){

            if (!empty($val)){
                $attribute = new ProductAttribute;
                $attribute['original_price']=$val;
                $attribute['offer_price'] = $data['offer_price'][$key];
                $attribute['stock']       = $data['stock'][$key];
                $attribute['product_id']  = $id;
                $attribute['size']       = $data['size'][$key];
                $attribute->save();
                }
        }
        return redirect()->back()->with('success','Product attribute added successfully');
    }

    public function addProductAttributeDelete($id)
    {
        $productAttr = ProductAttribute::find($id);
        if ($productAttr){
            $status = $productAttr->delete();
            if ($status){
                return redirect()->back()->with('success','Product attribute successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
