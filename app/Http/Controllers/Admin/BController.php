<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\BCategory;
use App\PCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BController extends Controller
{
    public function index()
    {
        $categories = BCategory::all();
        return view('admin.bcategories.index',['categories'=>
            $categories]);
    }


    public function create()
    {
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
        return view('admin.bcategories.create', compact('m_builder'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'parent_id' => 'required'
        ]);
        $bcategory = BCategory::create($request->all());
        $bcategory->uploadImage($request->file('image'));
        $bcategory->uploadImage2($request->file('image2'));
        return redirect()->route('menucategories.index');
    }

    public function edit($id)
    {
        $bcategory = BCategory::find($id);
        $tags = PCategory::pluck('title', 'id')->all();
        $selectedTags = $bcategory->p_categories->pluck('id')->all(); 
        
        $products = Product::pluck('title', 'id')->all();
        $selectedProducts = $bcategory->products->pluck('id')->all();

        return view('admin.bcategories.edit', 
        compact('bcategory', 'tags' , 'selectedTags', 'products', 'selectedProducts'));
    }


    public function update(Request $request, $id)
    {
        $bcategory = BCategory::find($id);
        $bcategory->update($request->all());
        $bcategory->setTags($request->get('tags'));

        $bcategory->setProducts($request->get('products'));// работает при добавление фильров одновременно


        $bcategory->uploadImage($request->file('image'));
        $bcategory->uploadImage2($request->file('image2'));
        return redirect()->route('menucategories.index');
    }

    public function destroy($id)
    {
        BCategory::find($id)->remove();
        return redirect()->route('menucategories.index');
    }
}
