<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','description','cat_id','child_cat_id','price','brand_id','discount','status','photo','size','stock','user_id','added_by','condition'];

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function rel_prods()
    {
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->limit(10);
    }

    public static function getProductByCart($id)
    {
        return self::where('id',$id)->get()->toArray();

    }



public function orders()
{
    return $this->belongsToMany(Order::class,'product_orders')->withPivot('quantity');//->withTimestamps(true);
}
}
