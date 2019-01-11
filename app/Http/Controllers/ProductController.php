<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\BCategory;
use App\PCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
       $category_id = $request->category_id;

       $category_id = $request->category_id;
       $filter_p_ids = [];
       $filters_ids = [];
      
       if($request->sortBy != null){
        $sort = $request->sortBy;
        $sort_value = $request->sortBy_value;
       }else{
        $sort = 'price';
        $sort_value = 'desc';
       }
      

       $filters_id = DB::table('m_category_p_filter')->where('m_category_id', $category_id)->get();

       foreach($filters_id as $filter){
           $filters_ids[] = $filter->p_filter_id;
       }

       $series = PCategory::whereIn('id', $filters_ids)->where('filter_type',1)->withCount('filter_products')->get();
       $features = PCategory::whereIn('id', $filters_ids)->where('filter_type',0)->withCount('filter_products')->get();
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
      
       $products = Product::whereIn('id',$products_ids)->orderBy($sort, $sort_value)->get();
       return response()->json(array(
           'series'=>$series,
           'features'=>$features,
           'products'=>$products
        ));    
    }




    public function productsFilter(Request $request){
        $category_id = $request->category_id;
        $filter_id = $request->filters;

        $filter_p_ids = [];
        $products_ids = [];

        if($request->sortBy != null){
            $sort = $request->sortBy;
            $sort_value = $request->sortBy_value;
           }else{
            $sort = 'price';
            $sort_value = 'desc';
           }
           
        $filters = DB::table('p_filter_product')->whereIn('p_filter_id', $filter_id)->get();

        foreach($filters as $filter){
            $filter_p_ids[] = $filter->product_id;
        }

        $products_id = DB::table('m_category_product')->where('m_category_id' , $category_id)
        ->whereIn('product_id',$filter_p_ids)
        ->get();

        foreach($products_id as $product){
            $products_ids[] = $product->product_id;
        }
       
        $products = Product::whereIn('id',$products_ids)->orderBy($sort, $sort_value)->get();

        return response()->json(array('products'=>$products));
    }



}
