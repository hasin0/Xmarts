<?php

class Helper{




    public static function minprice()
    {
        return floor(\App\Models\Product::min('offer_price'));
    }


    public static function maxprice()
    {
        return floor(\App\Models\Product::max('offer_price'));
    }


}






?>