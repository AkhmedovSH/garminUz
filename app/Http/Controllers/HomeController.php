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
        return view('home');
    }




    public function bcategory($bcategory_id)
    {
        return view('product', compact('bcategory_id'));
    }
}
