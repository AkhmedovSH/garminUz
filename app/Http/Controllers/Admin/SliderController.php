<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $categories = Slider::all();
        return view('admin.slider.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $slider = Slider::create($request->all());
        $slider->uploadImage($request->file('image'));
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $category = Slider::find($id);
        return view('admin.slider.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {

        $category = Slider::find($id);

        $category->update($request->all());
        $category->uploadImage($request->file('image'));

        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        Slider::find($id)->delete();
        return redirect()->route('slider.index');
    }
}
