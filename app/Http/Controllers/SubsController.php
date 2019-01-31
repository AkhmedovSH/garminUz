<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Mail\SubscribeEmail;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
    	$this->validate($request, [
    		'email'	=>	'required|email|unique:subscriptions'
    	]);
    	
    	$subs = Subscription::add($request->get('email'));

    	return redirect()->back()->with('status','Вы подписаны на новости!СПАСИБО!');
    }

}
