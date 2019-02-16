<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function store(Request $request)
    {

        $coupon = Coupon::where('code', $request->coupon_code)->first();
        
        if (!$coupon) {
            return back()->withErrors('несуществующий купон попробуйте сново!.');
        }
        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success', 'Купон добавлен!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return back()->with('success', 'Купон был удачно удален.');
    }
}
