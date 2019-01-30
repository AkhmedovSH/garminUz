<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductGroup;

class ProductGroupController extends Controller
{
    public function index()
    {
        $categories = ProductGroup::all();
        return view('admin.productGroup.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.productGroup.create');
    }

    public function store(Request $request)
    {
        ProductGroup::create($request->all());
        return redirect()->route('product-group.index');
    }

    public function edit($id)
    {
        $category = ProductGroup::find($id);
        return view('admin.productGroup.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductGroup::find($id);

        $category->update($request->all());

        return redirect()->route('product-group.index');
    }

    public function destroy($id)
    {
        ProductGroup::find($id)->delete();
        return redirect()->route('product-group.index');
    }
}
