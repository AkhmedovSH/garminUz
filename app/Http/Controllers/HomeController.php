<?php

namespace App\Http\Controllers;

use App\Post;
use App\Slider;
use App\Product;
use App\BCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{

    public function index()
    {
        /* $product = Product::where('slug','vivofit-4')->with('accessories')->firstOrFail();
        dd($product); */

        $sliders = Slider::take(5)->orderBy('id','DESC')->get();
        $posts = Post::orderBy('id','DESC')->take(10)->get();
        $products = Product::where('main_page',1)->orderBy('id','DESC')->take(10)->get();
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

    public function buyProducts(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $city = $request->city;
        $country = $request->country;
        $street = $request->street;
        $postcode = $request->postcode;

        $to_name = $request->name;
        $to_email = 'info.garminuz@gmail.com';//shurikaxmedov1@gmail.com
        $data = array('name' => $name, "phone" => $phone ,
                     'city' => $city, "country" => $country,
                     'street' => $street, "postcode" => $postcode);
        Mail::send('emails.mail', ["info"=>$data], function($message) use ($to_name, $to_email) {
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
        $search_results = Product::where('title', 'LIKE', "%$name%")
        ->orWhere('slug', 'LIKE', "%$name%")->where('status' , 1)->paginate(10);
        return view('search', compact('search_results','name'));
    }




    public function bcategory($bcategory_id)
    {
        $category = BCategory::where('id',$bcategory_id)->firstOrFail();
        $posts = Post::all()->random(3);
        return view('product', compact('bcategory_id','category', 'posts'));
    }
}
