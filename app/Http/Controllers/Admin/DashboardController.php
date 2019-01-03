<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        //$black_title = DB
        $black_title = DB::table('black_title')->first();
        return view('admin.dashboard', compact('black_title'));
    }

    public function edit_black_title(Request $request){
        $black_title = $request->title;
        DB::table('black_title')
            ->where('id', 1)
            ->update(['title' => $black_title]);
        return redirect()->back();
    }
}
