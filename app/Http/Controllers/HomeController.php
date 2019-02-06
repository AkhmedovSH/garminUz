<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\BCategory;
use App\PCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slider;
use App\Post;


class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::take(5)->orderBy('id','DESC')->get();
        $posts = Post::orderBy('id','DESC')->take(10)->get();
        //dd($posts);
        //dd($sliders);
        return view('main', compact('sliders','posts'));
    }

    public function maps($parametr)
    {
        return view('maps', compact('parametr'));
    }

    public function blog($slug)
    {
        $post = Post::where('slug',$slug)->orderBy('id','DESC')->firstOrFail();
        return view('blog', compact('post'));
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $search_results = Product::where('title', 'LIKE', "%$name%")->where('status' , 1)->paginate(10);
        return view('search', compact('search_results','name'));
    }




    public function bcategory($bcategory_id)
    {
        $category = BCategory::where('id',$bcategory_id)->firstOrFail();
        return view('product', compact('bcategory_id','category'));
    }
}
