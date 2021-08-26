<?php

use App\Models\Category;


Route::name('admin')->prefix('admin')  // 後台
    // -> middleware('can:admin') // 使用middleware 控制權限
    ->group(function () {
        Route::get('/', 'AdminController@index');
        Route::namespace('API')->group(function () {
            Route::get('/news', 'NewsController@index')->name('.news');
            Route::get('/banner', 'BannerController@index')->name('.banner');
            Route::get('/category', 'CategoryController@index')->name('.category');
            Route::get('/order', 'OrderController@index')->name('.order');
            Route::get('/user', 'UserController@index')->name('.user');
            Route::get('/product', 'ProductController@index')->name('.product');
        });
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'MainController@index')->name('main');
    Route::name('categories')->prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/{id}', 'CategoryController@show')->name('.show');
    });
    Route::get('/news', 'NewsController@index')->name('news');
    Route::get('/products', 'ProductController@index')->name('product');
    Route::get('/orders', 'OrderController@index')->name('order');
});

$categories=Category::where([['show',1],['parent',0]])->orderBy('order','asc')->get();

Route::view('/forgetpassword', 'frontend.forget',['categories'=>$categories])->name('forget');
Route::view('/login', 'frontend.login',['categories'=>$categories])->name('login');
Route::view('/register', 'frontend.register',['categories'=>$categories])->name('register');
