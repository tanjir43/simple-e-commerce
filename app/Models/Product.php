<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','summary','is_featured','description','user_id','added_by','return_cancellation','additional_info','size_guide','stock','price','offer_price','discount','conditions','status','photo','vendor_id','cat_id','child_cat_id','size','brand_id'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function rel_product(){
    return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->limit(10);
    }
    public function attributes(){
        return $this->hasMany(ProductAttribute::class);
    }

    public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'product_orders')->withPivot('quantity');
    }
    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }

}
