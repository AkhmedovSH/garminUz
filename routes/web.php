<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog/{slug}', 'HomeController@show')->name('blog.show');
Route::get('/blog', 'HomeController@blog');

Route::get('/product-category/{bcategory_id}', 'HomeController@bcategory')->name('bcategory');

/*
    GET RESULT BY VUE COMPONENTS
*/
Route::post('/products', 'ProductController@getProducts');











Route::group(['middleware' => ['auth']], function (){
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::get('/editprofile', 'ProfileController@editOwnProfile');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'guest'], function (){
    //Password reset route
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
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

Route::group(['middleware' => 'web'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

Auth::routes();


