<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route; 這是原框架的trait 可是報錯如下
// BadMethodCallException  : Method Illuminate\Routing\Route::namespace does not exist.
// 所以替換為它

Auth::routes(); // 產生登入相關routes
// 詳細設定 project\vendor\laravel\framework\src\Illuminate\Routing\Router.php
// public function auth(){...}

// ---------------------------  前台  ---------------------------------- //
Route::namespace('Web')->group(function () {
    Route::get('/', 'HomeController@main')->name('home'); // 首頁

    Route::prefix('/news')->name('news.')->group(function () { // 育貓新知
        Route::get('/', function () {
            return redirect()->to('/news/all');
        })->name('index');
        Route::get('/{news}', 'HomeController@news')->name('show');
    });

    Route::prefix('/category')->group(function () { //商品與目錄
        Route::get('/', function () {
            return redirect()->to('/category/all');
        })->name('category.index');
        Route::get('/{category}', 'HomeController@category')->name('category.show'); // 該目錄下所有商品
    });
    Route::get('/product/{product}', 'HomeController@product')->name('product.show'); // 單一商品

    Route::middleware('auth')->prefix('/user')->group(function () { // 使用者相關：這幾項需要登入授權
        Route::get('/profile', 'HomeController@user')->name('profile'); // 使用者資訊
        Route::get('/recipient', 'HomeController@recipient')->name('recipient'); // 收件者資訊
        Route::get('/cart', 'HomeController@cart')->name('cart'); // 購物車
        Route::get('/order', 'HomeController@order')->name('order.index'); // 歷史訂單
        Route::get('/order/{order}', 'HomeController@orderShow')->name('order.show'); // 單一訂單細節
    });
});

Route::post('password/reset/web', 'Auth\ResetPasswordController@resetPasswordWeb')->name('password.reset.web'); // 登入後變更密碼（非忘記密碼）

// ---------------------------  後台 先不用middleware 比較方便  ---------------------------------- //
// Route::prefix('admin')->namespace('Web')->name('admin')->middleware('can:admin')->group(function () { // 後台
Route::prefix('admin')->namespace('Web')->name('admin')->group(function () {
    Route::get('/', 'AdminController@main');
    Route::get('/news', 'AdminController@news')->name('.news');
    Route::get('/banner', 'AdminController@banner')->name('.banner');
    Route::get('/category', 'AdminController@category')->name('.category');
    Route::get('/order', 'AdminController@order')->name('.order');
    Route::get('/user', 'AdminController@user')->name('.user');
    Route::prefix('/product')->name('.product')->group(function () {
        Route::get('/', function () {
            return redirect()->to('/admin/product/c/all');
        });
        Route::get('/c/{c_id}', 'AdminController@product')->name('.index');
    });
});
