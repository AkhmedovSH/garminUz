<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;

class CouponsController extends Controller
{
    public function index()
    {
        $categories = Coupon::all();
        return view('admin.coupons.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $coupon = Coupon::create($request->all());
        return redirect()->route('coupons.index');
    }

    public function edit($id)
    {
        $category = Coupon::find($id);
        return view('admin.coupons.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {

        $category = Coupon::find($id);
        $category->update($request->all());
        return redirect()->route('coupons.index');
    }

    public function destroy($id)
    {
        Coupon::find($id)->delete();
        return redirect()->route('coupons.index');
    }
}
