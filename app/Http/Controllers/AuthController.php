<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $this->validate($request,[
           'name' => 'required|string|min:3|max:13',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|email|unique:users'
        ]);
        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        return redirect('/login');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'password' => 'required',
            'email' => 'required|email'
        ]);
        $remembercheck = Input::get('remember');
        if(!empty($remembercheck)){
            $remember = true;
        }else{
            $remember = false;
        }
        $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        
        if (Auth::attempt($credentials,$remember)) {
            return redirect('/');
        }else{
            return redirect()->back();
        }
    }

    public function socialLogin($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {

        $user = $this->createOrGetUser(Socialite::driver($provider)->user(), $provider);
        return redirect()->action('HomeController@index');

    }

    private function createOrGetUser($userSocial, $provider)
    {
        $user = User::where(['email'=>$userSocial->getEmail()])->first();
        if ($user){
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }else{
            $user = User::create([
                'email' => $userSocial->getEmail(),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
                'name' => 'user'.rand(100000, 999999),
                'firstname' => $userSocial->getName(),
                'firstname' => $userSocial->getNickName()
            ]);
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }
    }



    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
