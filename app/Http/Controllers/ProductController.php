<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\BCategory;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
       $category_id = $request->category_id;

       $categories = BCategory::where('id',  $category_id)
       ->with(['p_categories' => function ($query) {
       $query->where('filter_type',1);
       }])->with(['p_categories2' => function ($query) {
       $query->where('filter_type',0); 
       }])->with(['products' => function ($query) {
       $query;
       }])->get();

       return response()->json($categories);    
    }
}
