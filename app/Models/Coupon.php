<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;


class Coupon extends Model
{

    use HasFactory;
    protected $fillable=['code','type','value','status'];


    public function discount($total){
       // $total=$total + 0;
      //  dd($total);
        //dd($this->type);
        if($this->type=="fixed"){
            return $this->value;

        }
        elseif($this->type=="percent"){
           // dd($this->value /100)*$total;
            // $totals=
         //dd((float)$total);
        // return round(($this->percent_off / 100) * $total);
        

            return  (round(($this->value /100) * (double)$total));
            // dd((int)$totals);

             //$totals*$total;
        }
        else{
            return 0;
        }
    }

}
