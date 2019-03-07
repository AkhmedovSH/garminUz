<?php

namespace App;

use Illuminate\Support\Facades\DB;
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


    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        $total = ( str_replace(',', '', $total));
        $dollar = DB::table('dollar')->first();

        if ($this->type == 'fixed') {
            return $this->value;
        } elseif ($this->type == 'percent') {
           
            return round((($this->percent_off / 100) * $total));
        } else {
            return 0;
        }
    }
}
