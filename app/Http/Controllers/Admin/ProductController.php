<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\BCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PCategory;
use App\ProductGroup;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $menu = BCategory::all();

        $tags = BCategory::pluck('title', 'id')->all();
        $filters = PCategory::pluck('title', 'id')->all();
        $productGroup = ProductGroup::pluck('title', 'id')->all();

        return view('admin.products.create',compact('tags','filters','productGroup'));
    }

 
    public function store(Request $request)
    {
        /*  $this->validate($request,[
            'featured' => 'boolean',
            'new' => 'nullable'
        ]);  */
       //dd($request->all());
       $product = Product::add($request->all());
       $product->uploadImage($request->file('image'));
       $product->uploadMultipleImages($request->file('images'));
       $product->setTags($request->get('categories'));
       $product->setFilters($request->get('filters'));
       return redirect()->route('products.index');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Product::find($id)->remove();

        return redirect()->route('products.index');
    }
}
