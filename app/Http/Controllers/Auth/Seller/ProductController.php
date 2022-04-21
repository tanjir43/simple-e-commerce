<?php

namespace App\Http\Controllers\Auth\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function back;
use function redirect;
use function response;
use function view;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where(['added_by'=>'seller', 'user_id'=>auth('seller')->user()->id])->orderBy('id','DESC')->get();
        return view('backend.seller.product.manage',compact('products'));
    }

    public function productStatus(Request $request){
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
        if (auth('seller')->user()->is_verified){
            return view('backend.seller.product.create');
        }
        else{
            return back()->with('errors','You need to verified your account');
        }
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
        $slug_count = Product::where('slug',$slug)->count();
        if ($slug_count>0){
            $slug = $slug.'-'.Str::random(4);
        }
        $data['slug'] = $slug;

        $data['added_by'] = 'seller';
        $data['user_id'] = auth('seller')->user()->id;

        $data['offer_price']  = ($request->price-(($request->price*$request->discount)/100));

        $status = Product::create($data);
        if ($status){
            return redirect()->route('seller-product.index')->with('success','Product created successfully');
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
            return view('backend.seller.product.product-attribute',compact(['product','productAttr']));
        }
        else{
            return  back()->with('errors','Product not found');
        }

    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product){
            return view('backend.seller.product.edit',compact('product'));
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
                return redirect()->route('seller-product.index')->with('success','Product updated successfully');
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
                return redirect()->route('seller-product.index')->with('success','Product successfully deleted');
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
