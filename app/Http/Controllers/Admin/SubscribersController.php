<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs = Subscription::all();
        return view('admin.subs.index',['subs' => $subs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subs.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
           'email' => 'required|email|unique:subscriptions'
        ]);

        Subscription::add($request->get('email'));

        return redirect()->route('subscribers.index');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Subscription::find($id)->delete();
        return redirect()->route('subscribers.index');
    }
}
