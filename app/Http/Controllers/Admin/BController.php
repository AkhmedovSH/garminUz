<?php

namespace App\Http\Controllers\Admin;

use App\BCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PCategory;

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
        BCategory::create($request->all());
        return redirect()->route('bookcategories.index');
    }

    public function edit($id)
    {
        $bcategory = BCategory::find($id);
        $tags = PCategory::pluck('title', 'id')->all();
        $selectedTags = $bcategory->p_categories->pluck('id')->all();
        
        return view('admin.bcategories.edit', compact('bcategory','tags','selectedTags'));
    }


    public function update(Request $request, $id)
    {
        $bcategory = BCategory::find($id);


        $bcategory->setTags($request->get('tags'));

        return redirect()->route('bookcategories.index');
    }

    public function destroy($id)
    {
        BCategory::find($id)->delete();
        return redirect()->route('bookcategories.index');
    }
}
