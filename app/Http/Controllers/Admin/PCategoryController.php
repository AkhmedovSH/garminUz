<?php

namespace App\Http\Controllers\Admin;

use App\BCategory;
use App\PCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class PCategoryController extends Controller
{
    public function index(){
        $categories = PCategory::all();
        return view('admin.product_categories.index',compact('categories'));
    }

    public function create(){
        $tags = BCategory::pluck('title', 'id')->all();

        
        $menu = BCategory::all();
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
        return view('admin.product_categories.create', compact('m_builder','tags'));
    }

    public function store(Request $request){
        $category = PCategory::create($request->all());

        $category->setTags($request->get('tags'));
        return redirect()->route('productcategories.index');
    }

    public function edit($id){
        $category = PCategory::find($id);

        $tags = BCategory::pluck('title', 'id')->all();
        $selectedTags = $category->menu_categories->pluck('id')->all();

        $products = Product::pluck('title', 'id')->all();
        $selectedProducts = $category->filter_products->pluck('id')->all();

        $menu = BCategory::all();
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
        return view('admin.product_categories.edit',
        compact('category','m_builder', 'tags', 'selectedTags', 'products', 'selectedProducts'));
    }

    public function update(Request $request, $id){
        $category = PCategory::find($id);

        $category->edit($request->all());

        $category->setProducts($request->get('products'));
        $category->setTags($request->get('tags'));
        
        return redirect()->route('productcategories.index');
    }

    public function destroy($id){
        PCategory::find($id)->delete();
        return redirect()->route('productcategories.index');
    }
}
