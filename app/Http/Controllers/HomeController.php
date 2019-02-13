<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Slider;
use App\Product;
use App\BCategory;
use App\PCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;


class HomeController extends Controller
{

    public function index()
    {
        //dd(Cart::content());
        $sliders = Slider::take(5)->orderBy('id','DESC')->get();
        $posts = Post::orderBy('id','DESC')->take(10)->get();
        $products = Product::where('main_page',1)->orderBy('id','DESC')->take(10)->get();
        //dd($posts);
        //dd($sliders);
        return view('main', compact('sliders','posts','products'));
    }

    public function maps($parametr)
    {
        return view('maps', compact('parametr'));
    }

    public function checkout()
    {
        return view('checkout');
    }
    
    public function mail()
    {
        return view('emails.mail');
    }

    public function buyProducts()
    {
        $to_name = 'Петя';
        $to_email = 'shurikaxmedov1@gmail.com';
        $data = array('name'=>"Shokhrukh", "body" => "Test mail");
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Garmin.uz | Ваши Новые заказы');
            $message->from('shurikaxmedov1@gmail.com','С уважением');
        });
        return view('checkout');
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
        $posts = Post::all()->random(3);
        return view('product', compact('bcategory_id','category', 'posts'));
    }
}
