<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\BCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PCategory;

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
        $m_builder=\Menu::make('MyNav', function ($m) use($menu){
            foreach ($menu as $item){
                if($item->parent_id==0){
                    $m->add($item->title, $item->slug)->id($item->id);
                }
                else {
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->title, $item->slug)->id($item->id);
                    }
                }
            }
        });

        return view('admin.products.create',compact('m_builder','tags','filters'));
    }

 
    public function store(Request $request)
    {
        //dd($request->all());
        $product = Product::add($request->all());
       
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
