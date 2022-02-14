<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   // 'shipping_id'

    protected $fillable=['user_id','product_id','order_number','address1','sub_total','quantity','delivery_charge','total_amount','first_name','last_name','country','post_code',
    'address','saddress','phone','email','payment_method','payment_status','coupon',
    'sfirst_name','slast_name','scountry','saddress','sphone','semail','note',
    'payment_method','payment_status','condition',



];

public function products()
{
    return $this->belongsToMany(product::class,'product_orders')->withPivot('quantity');//->withTimestamps(true);
}


public function shipping(){
    return $this->belongsTo(Shipping::class,'shipping_id');
}

}
