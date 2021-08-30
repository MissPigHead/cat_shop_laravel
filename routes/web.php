<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route; 這是原框架的trait 可是報錯如下
// BadMethodCallException  : Method Illuminate\Routing\Route::namespace does not exist.
// 所以替換為它

Auth::routes(); // 產生登入相關routes
// 詳細設定 project\vendor\laravel\framework\src\Illuminate\Routing\Router.php
// public function auth(){...}

Route::namespace('Web')->group(function () { // 前台
    Route::get('/', 'HomeController@main')->name('home');

    Route::prefix('/news')->name('news.')->group(function () { // 育貓新知
        Route::get('/', 'HomeController@news')->name('index');
        Route::get('/{news}', 'HomeController@newsShow')->name('show');
    });

    Route::prefix('/category')->group(function () { //商品與目錄
        Route::get('/', function () {
            return redirect()->to('/category/all');
        });
        Route::get('/{category}', 'HomeController@categoryShow')->name('category.show'); // 該目錄下所有商品
        Route::get('/{category}/product/{product}', 'HomeController@productShow')->name('product.show'); // 單一商品
    });

    Route::middleware('auth')->prefix('/user')->group(function () { // 使用者 購物車 訂單 收件: 這幾項需要登入授權
        Route::get('/profile', 'HomeController@user')->name('profile'); // 使用者資訊含收件人
        Route::get('/cart', 'HomeController@cart')->name('cart'); // 購物車
        Route::get('/order', 'HomeController@order')->name('order.index'); // 歷史訂單
        Route::get('/order/{order}', 'HomeController@orderShow')->name('order.show'); // 歷史訂單
    });
});

// ---------------------------  後台 先不用middleware 比較方便  ---------------------------------- //
// Route::prefix('admin')->namespace('Web')->name('admin')->middleware('can:admin')->group(function () { // 後台
Route::prefix('admin')->namespace('Web')->name('admin')->group(function () {
    Route::get('/', 'AdminController@main');
    Route::get('/news', 'AdminController@news')->name('.news');
    Route::get('/banner', 'AdminController@banner')->name('.banner');
    Route::get('/category', 'AdminController@category')->name('.category');
    Route::get('/order', 'AdminController@order')->name('.order');
    Route::get('/user', 'AdminController@user')->name('.user');
    Route::get('/product', 'AdminController@product')->name('.product');
});


// ----------------- 測試用 -------------------- //
// use App\Models\User;
use App\Models\Product;
// use App\Http\Resources\User as UserResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Category;

// use App\Http\Resources\UserCollection;

// Route::get('/test2', function () {
//     return UserResource::collection(User::with('recipients')->with('orders')->get());
//     // return UserResource::collection(User::all()->keyBy->id);
// });

// Route::get('/test1', function () {
//     return CategoryResource::collection(Category::where('parent','<>',0)->get());
// });
// Route::get('/test2', function () {
//     // return $p_id=Category::find(8)->parent;
//     return new CategoryResource(Category::find(8));
//     // return new CategoryResource(Category::with('parent_name')->find(1));
// });

// Route::get('/test5', function () {
//     // return ProductResource::collection(Product::paginate(10));
//     // return new ProductResource(Product::find(3));
//     return new ProductResource(Product::with('category')->find(3));
//     // return new ProductResource(Product::find(3)->with('category'));
// });
// Route::get('/test6', function () {
//     // return ProductResource::collection(Product::paginate(10));
//     return ProductResource::collection(Product::with('category')->get());
// });

// Route::get('/test7', 'API\ProductController@index');
// Route::get('/test8', function(){
//     return ProductResource::collection(Product::with('category')->paginate(10));
// });
