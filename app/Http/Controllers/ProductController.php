<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\BCategory;

class ProductController extends Controller
{
    public function getProducts()
    {
       //$categories = BCategory::where('id', 34)->with('p_categories')->get();


       $categories = BCategory::where('id', 34)->with(['p_categories' => function ($query) {
       $query->with('many_products')->withCount('many_products'); //select most popular solution
       }])->get();

       return response()->json($categories);
    }
}
