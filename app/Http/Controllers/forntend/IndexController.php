<?php

namespace App\Http\Controllers\forntend;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function home(){
        $banners            = Banner::where(['status'=>'active','conditions'=>'banner'])->orderBy('id','DESC')->limit('5')->get();
        $promo_banner       = Banner::where(['status'=>'active','conditions'=>'promo'])->orderBy('id','DESC')->first();
        $categories         = Category::where(['status'=>'active','is_parent'=>1])->orderBy('id','desc')->limit(4)->get();
        $new_products       = \App\Models\Product::where(['status'=>'active','conditions'=>'winter'])->orderBy('id','desc')->limit(6)->get();
        $brands             = Brand::where('status','active')->orderBy('id',"desc")->get();
        $featured_products  = \App\Models\Product::where(['status'=>'active','is_featured'=>1])->orderBy('id','DESC')->limit(6)->get();

        //--best selling
        $items       = DB::table('product_orders')->select('product_id',DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->orderBy('count','desc')->get();
        $product_ids=[];
        foreach ($items as $item){
            array_push($product_ids,$item->product_id);
        }
        $ids_implode_selling = implode(',',array_fill(0,count($product_ids),'?'));

        if ($ids_implode_selling !=null){
            $best_selling =Product::whereIn('id',$product_ids)->orderByRaw("field(id,{$ids_implode_selling})", $product_ids)->get();
        }
        else{
            $best_selling =[];
        }

        //-- Top rated
        $items_rated = DB::table('product_reviews')->select('product_id',DB::raw('AVG(rate) as count'))->groupBy('product_id')->orderBy('count','desc')->get();
        $product_ids =[];
        foreach ($items_rated as $item){
            array_push($product_ids,$item->product_id);
        }
        $ids_implode = implode(',',array_fill(0,count($product_ids),'?'));
       if ($ids_implode !=null){
           $top_rated = Product::whereIn('id',$product_ids)->orderByRaw("field(id,{$ids_implode})", $product_ids)->get();
       }
       else{
           $top_rated =[];
       }
        return view('frontend.home.home',compact(['banners','categories','featured_products','new_products','promo_banner','brands','best_selling','top_rated']));
    }

    public function aboutUs(){
        $about = AboutUs::first();
        return view('frontend.pages.about_us',compact('about'));
    }

    public function contactUs(){
        return view('frontend.pages.contact_us');
    }
    public function contactSubmit(Request $request){
        $this->validate($request,[
            'name' => 'string|required',
            'email' => 'email|required',
            'phone' => 'string|required',
            'subject' => 'min:4|string|required',
            'message' => 'string|required|max:200',
        ]);
        $data = $request->all();
        Mail::to('tanjirislam7@gmail.com')->send(new Contact($data));

        return back()->with('success','Successfully send your enquiry');

    }

    public function shop(Request $request){
        $products = Product::query();

        if (!empty($_GET['category'])){
            $slugs = explode(',',$_GET['category']);
            $cat_ids = Category::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('cat_id',$cat_ids);
        }
        //brand filter
        if (!empty($_GET['brand'])){
            $slugs = explode(',',$_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brand_ids);
        }

        // size filter

        if (!empty($_GET['size'])){
            $products = $products->where('size',$_GET['size']);
        }


        if (!empty( $_GET['sortBy'])){
            if ($_GET['sortBy'] == 'priceAsc') {
                $products = $products->where(['status' => 'active'])->orderBy('offer_price', 'ASC')->paginate(12);
            } if ($_GET['sortBy'] == 'priceDesc') {
                $products = $products->where(['status' => 'active'])->orderBy('offer_price', 'desc')->paginate(12);
            } if ($_GET['sortBy'] == 'discountAsc') {
                $products = $products->where(['status' => 'active'])->orderBy('price', 'ASC')->paginate(12);
            } if ($_GET['sortBy'] == 'discountDesc') {
                $products = $products->where(['status' => 'active'])->orderBy('price', 'desc')->paginate(12);
            } if ($_GET['sortBy'] == 'titleAsc') {
                $products = $products->where(['status' => 'active'])->orderBy('title', 'ASC')->paginate(12);
            } if ($_GET['sortBy'] == 'titleDesc') {
                $products = $products->where(['status' => 'active'])->orderBy('title', 'desc')->paginate(12);
            }
        }
        else{
            $products = $products->where('status','active')->paginate(12);
        }
        $brands = Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();
        $cats     = Category::where(['status'=>'active', 'is_parent'=>1])->with('products')->orderBy('title','ASC')->get();

        return view('frontend.pages.shop',compact(['products','cats','brands']));
    }
    public function shopFilter(Request $request){

        //category filter
        $data = $request->all();
        $catUrl = '';
        if (!empty($data['category'])){
            foreach ($data['category'] as $category){
                if (empty($catUrl)){
                    $catUrl .='&category='.$category;
                }
                else{
                    $catUrl .=','.$category;
                }
            }
        }

        //sort filter

        $sortByUrl = "";

        if (!empty($data['sortBy'])){
            $sortByUrl .='&sortBy='.$data['sortBy'];
        }

        //brand filter
        $brandUrl ="";
        if (!empty($data['brand'])){
            foreach ($data['brand'] as $brand){
                if (empty($brandUrl)){
                    $brandUrl .='&brand='.$brand;
                }
                else{
                    $brandUrl .=','.$brand;
                }
            }
        }

        //size filter
        $sizeUrl = "";
        if (!empty($data['size'])){
            $sizeUrl .='&size='.$data['size'];

        }
        return \redirect()->route('shop',$catUrl.$sortByUrl.$brandUrl.$sizeUrl);
    }

    public function autoSearch(Request $request){
       $query = $request->get('term','');
       $products = Product::where('title','LIKE','%'.$query.'%')->get();

       $data = array();
       foreach ($products as $product){
           $data[] = array('value'=>$product->title, 'id'=>$product->id);
       }
       if (count($data)){
           return $data;
       }
       else{
           return ['value'=>'No result found.','id'=>''];
       }
    }
    public function search(Request $request){
        $query = $request->input('query');
        $products = Product::where('title','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(12);
        $brands = Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();
        $cats     = Category::where(['status'=>'active', 'is_parent'=>1])->with('products')->orderBy('title','ASC')->get();

        return view('frontend.pages.shop',compact('products','cats','brands'));
    }

    public function productCategory(Request  $request, $slug)
    {
//        return $request->all();
        $categories = Category::with('products')->where('slug', $slug)->first();
        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }
        if ($categories == null) {
            return view('errors.404');
        } else {
            if ($sort == 'priceAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'asc')->paginate(12);
            } elseif ($sort == 'priceDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'desc')->paginate(12);
            } elseif ($sort == 'discountAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'asc')->paginate(12);
            } elseif ($sort == 'discountDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'desc')->paginate(12);
            } elseif ($sort == 'titleAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'asc')->paginate(12);
            } elseif ($sort == 'titleDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'desc')->paginate(12);
            } else {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->paginate(12);
            }
        }
            $route = 'product-category';
            if ($request->ajax()){
                $view = view('frontend.pages._single-product',compact('products'))->render();
                return response()->json(['html'=>$view]);
            }
            return view('frontend.pages.product-category', compact(['categories', 'route','products']));

    }

    public function productDetails($slug){
        $product = Product::with('rel_product')->where('slug',$slug)->first();
        if ($product){
            return view('frontend.pages.product-details',compact('product'));
        }else{
            return 'Product not found';
        }
    }

    public function userAuth(){
        Session::put('url.intended',URL::previous());
        return view('frontend.auth.auth');
    }
    public function loginSubmit(Request $request){
        $this->validate($request,[
            'email'     => 'email|required|exists:users,email',
            'password'  => 'required|min:4',
        ]);
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'status'=> 'active'])){
            Session::put('users',$request->email);
            if (Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'))->with('success','Successfully login');
            }
            else{
                return redirect()->route('homes')->with('success','Successfully login');
            }

        }else{
            return back()->with('error','Invalid email or password');
        }

    }
    public function registerSubmit(Request $request){
        $this->validate($request,[
            'username'   => 'nullable|string',
            'full_name'  => 'required|string',
            'email'      => 'email|required|unique:users,email',
            'password'   => 'min:4|required|confirmed',
        ]);
        $data   = $request->all();
        $check  = $this->create($data);
        Session::put('users',$data['email']);
        Auth::login($check);
        if ($check){
            return redirect()->route('homes')->with('success','Successfully registered');
        }else{
            return back()->with('error','Please check your credentials');
        }
    }
    private function create(array $data){
        return User::create([
            'full_name'     => $data['full_name'],
            'username'      => $data['username'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
        ]);
    }
    public function userDashboard(){
        $user = Auth::user();

        return view('frontend.user.dashboard',compact('user'));
    }
    public function userOrders(){
        $user = Auth::user();
        return view('frontend.user.orders',compact('user'));
    }
    public function userAddress(){
        $user = Auth::user();
        return view('frontend.user.address',compact('user'));
    }
    public function userAddressEdit(){
        $user = Auth::user();
        return view('frontend.user.address-edit',compact('user'));
    }
    public function userAddressUpdate(Request $request,$id){
        $user = User::where('id',$id)->update(['country'=>$request->country, 'city'=>$request->city, 'postcode'=>$request->postcode, 'state'=> $request->state,'address'=>$request->address]);
        if ($user){
            return back()->with('success', 'Address successfully updated');
        }else{
            return back()->with('error', 'Something went wrong');
        }
    }

    public function userShippingAddress(){
        $user = Auth::user();
        return view('frontend.user.shipping-address',compact('user'));
    }
    public function userShippingAddressEdit(){
        $user = Auth::user();
        return view('frontend.user.shipping-address-edit',compact('user'));
    }

    public function userShippingAddressUpdate(Request $request,$id){
        $user = User::where('id',$id)->update(['scountry'=>$request->scountry, 'scity'=>$request->scity, 'spostcode'=>$request->spostcode, 'sstate'=> $request->sstate,'saddress'=>$request->saddress]);
        if ($user){
            return back()->with('success', 'Shipping address successfully updated');
        }else{
            return back()->with('error', 'Something went wrong');
        }
    }


    public function editAccount(){
        $user = Auth::user();
        return view('frontend.user.edit-account',compact('user'));
    }

    public function updateAccount(Request  $request , $id){
        $this->validate($request,[
            'newpassword' => 'nullable|min:4',
            'oldpassword' => 'nullable|min:4',
            'full_name'   => 'required|string',
            'username'    => 'nullable|string',
            'phone'       => 'nullable|min:8',

        ]);
        $hashpassword = Auth::user()->password;

        if ($request->oldpassword== null && $request->newpassword==null){
             User::where('id',$id)->update(['full_name'=>$request->full_name, 'username'=>$request->usernmae, 'phone'=>$request->phone,'photo'=>$request->photo,]);
        }else{
            if (\Hash::check($request->oldpassword,$hashpassword)){
                if (!\Hash::check($request->newpassword,$hashpassword)){
                    User::where('id',$id)->update(['full_name'=>$request->full_name, 'username'=>$request->username, 'phone'=>$request->phone,'photo'=>$request->photo,'password'=>Hash::make($request->newpassword)]);
                    return back()->with('success', 'Account successfully updated');
                }else{
                    return back()->with('error','New password cannot be same with old password');
                }
            }else{
                return back()->with('error','Old password does not match');
            }
        }
    }

    public function userProfile(){
        $user = Auth::user();
        return view('frontend.user.profile-details',compact('user'));
    }


    public function userLogout(){
        Session::forget('users');
        Auth::logout();
        return redirect()->route('homes')->with('success','Successfully logout');
    }








}
