<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog/{slug}', 'HomeController@show')->name('blog.show');
Route::get('/blog', 'HomeController@blog');

Route::get('/products/{category_id}', 'HomeController@bcategory')->name('bcategory');
Route::post('/search', 'HomeController@search');
Route::get('/maps/{parametr}', 'HomeController@maps');


/*
    GET RESULT BY VUE COMPONENTS
*/
Route::get('/products', 'ProductController@getProducts');
Route::get('/products/filter', 'ProductController@productsFilter');
Route::get('/product/{slug}', 'ProductController@oneProductView');
Route::get('/one-product', 'ProductController@oneProduct'); // oneproductcomponent
Route::get('/one-product-choose', 'ProductController@choosenProduct'); // oneproductcomponent
Route::get('/add-to-cart', 'ProductController@choosenProduct'); // oneproductcomponent


Route::get('empty', function (){Cart::destroy();});
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/update', 'CartController@update')->name('cart.update');



Route::group(['middleware' => ['auth']], function (){
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'guest'], function (){
    //Password reset route
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/register', 'AuthController@registerForm')->name('register');
    Route::post('/register', 'AuthController@register');
   /*  Route::get('/login', 'AuthController@loginForm')->name('login'); */
    Route::post('/login', 'AuthController@login');
});




Route::group(['prefix'=> 'admin', 'namespace' => 'Admin', 'middleware' => 'role:administrator|editor|author|moderator'], function (){
    Route::get('/', 'DashboardController@index');
    Route::post('/edit_black_title', 'DashboardController@edit_black_title')->name('black_title');

    Route::resource('/categories','CategoriesController');
    Route::resource('/menucategories','BController');
    Route::resource('/tags','TagsController');
    Route::resource('/posts','PostsController');
    Route::resource('/slider','SliderController');
    Route::resource('/coupons','CouponsController');
    Route::resource('/productcategories', 'PCategoryController');
    Route::resource('/products', 'ProductController');

    Route::resource('/users','UsersController');
    Route::get('/user/toggleBan/{user_id}','UsersController@toggleBan');

    Route::resource('/subscribers','SubscribersController');
    Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
    Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
});

Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');


