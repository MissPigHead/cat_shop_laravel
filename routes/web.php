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
    Route::get('/rules', 'HomeController@rules')->name('rules'); // 購物須知

    // Route::middleware('auth')->prefix('/user')->group(function () { // 使用者相關：這幾項需要登入授權
    Route::middleware('auth')->group(function () { // 使用者相關：這幾項需要登入授權
        Route::get('/profile', 'HomeController@user')->name('profile'); // 使用者資訊
        Route::get('/recipient', 'HomeController@recipient')->name('recipient'); // 收件者資訊
        Route::get('/cart', 'HomeController@cart')->name('cart'); // 購物車

        Route::prefix('/order')->group(function () { // 訂單
            Route::get('/', 'HomeController@order')->name('order'); // 待結帳訂單
            Route::get('/checkout', 'HomeController@checkout')->name('checkout'); // 訂單付款，接金流端
            Route::get('/paid', 'HomeController@paid')->name('order.paid'); // 已確認金流付款完成訂單
            Route::get('/history', 'HomeController@orderHistory')->name('order.history'); // 全部歷史訂單
            Route::get('/history/{order}', 'HomeController@orderShow')->name('order.show'); // 單一歷史訂單細節
        });
    });
});

Route::post('/payment/callback', 'API\OrderController@callback')->name('callback'); // test for ecpay
Route::get('/payment/success', 'API\ECPayController@success')->name('success'); // test for ecpay

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

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
Route::get('/test', function () {
    $id1=substr(Str::uuid(),4,24);
    $id2=Str::uuid();
    $id3=Str::uuid();
    dump($id1);
    dump($id2);
    dump($id3);

    echo  strlen($id1);
    $carts=Auth::user()->carts;
    dump($carts);
    echo '<hr>';
    echo '<hr>';
    echo base_path();
    // $order=Order::create(); // 建立訂單
    // dd($order);
});
