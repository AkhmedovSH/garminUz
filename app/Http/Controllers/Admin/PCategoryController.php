<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PCategory;

class PCategoryController extends Controller
{
    public function index(){
        $categories = PCategory::all();
        return view('admin.product_categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.product_categories.create');
    }

    public function store(Request $request){
        PCategory::create($request->all());
        return redirect()->route('productcategories.index');
    }

    public function edit($id){
        $category = PCategory::find($id);
        return view('admin.product_categories.edit',compact('category'));
    }

    public function update(Request $request, $id){
        $category = PCategory::find($id);

        $category->update($request->all());

        return redirect()->route('productcategories.index');
    }

    public function destroy($id){
        PCategory::find($id)->delete();
        return redirect()->route('productcategories.index');
    }
}
