<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\BCategory;
use App\PCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

/*     public function __construct()
    {
        $this->middleware('auth');
    } */

    public function index()
    {
/*          $category_id = 73;
        $filter_p_ids = [];

        $filters_ids = [];
        $filters_id = DB::table('m_category_p_filter')->where('m_category_id', $category_id)->get();
        
        foreach($filters_id as $filter){
            $filters_ids[] = $filter->p_filter_id;
        }

        $series = PCategory::where('filter_type', 1)->whereIn('id', $filters_ids)->get();
        $features = PCategory::where('filter_type', 0)->whereIn('id', $filters_ids)->get();
        $filters_products = DB::table('p_filter_product')->whereIn('p_filter_id', $filters_ids)->get();
        
        foreach($filters_products as $filter){
            $filter_p_ids[] = $filter->product_id;
        }

        $products_id = DB::table('m_category_product')->where('m_category_id' , $category_id)
        ->whereIn('product_id',$filter_p_ids)
        ->get();
        
        foreach($products_id as $product){
            $products_ids[] = $product->product_id;
        }
       
        $products = Product::whereIn('id',$products_ids)->get();  */


        $category_id = 73;
        $filter_p_ids = [];

        $filters_ids = [];
        $filters_id = DB::table('m_category_p_filter')->where('m_category_id', $category_id)->get();
            
        foreach($filters_id as $filter){
            $filters_ids[] = $filter->p_filter_id;
        }

        $series = PCategory::where('filter_type', 1)->whereIn('id', $filters_ids)->withCount('filter_products')->get();


        $features = PCategory::where('filter_type', 0)->whereIn('id', $filters_ids)->get();
        $filters_products = DB::table('p_filter_product')->whereIn('p_filter_id', $filters_ids)->get();

        foreach($filters_products as $filter){
            $filter_p_ids[] = $filter->product_id;
        }

        $products_id = DB::table('m_category_product')->where('m_category_id' , $category_id)
        ->whereIn('product_id',$filter_p_ids)
        //->join('products', 'm_category_product.product_id', '=', 'products.id')
        ->get();
        
        foreach($products_id as $product){
            $products_ids[] = $product->product_id;
        }
       
        $products = Product::whereIn('id',$products_ids)->get();

        return view('home');
    }




    public function bcategory($bcategory_id)
    {
        return view('product', compact('bcategory_id'));
    }
}
