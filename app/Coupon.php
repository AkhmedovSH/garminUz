<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $guarded = [];

    public static function add($fields){
        $coupon = new static;
        $coupon->fill($fields);
        $coupon->save();
        return $coupon;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }
}
