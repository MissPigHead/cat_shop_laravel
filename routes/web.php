<?php

Auth::routes(); // 產生登入相關routes
// 詳細設定 project\vendor\laravel\framework\src\Illuminate\Routing\Router.php
// public function auth(){...}

Route::get('/', 'HomeController@main')->name('home');

Route::prefix('/news')->group(function(){
    Route::get('/','HomeController@news')->name('news.index');
    Route::get('/{news}','HomeController@newsDetail')->name('news.show');
});
Route::get('/category','HomeController@category')->name('categories.index');
Route::get('/category/{category}','HomeController@categoryShow')->name('categories.show');
Route::get('/products','HomeController@product')->name('product.index');
Route::get('/products/{product}','HomeController@productDetails')->name('products.show');
Route::get('/orders','HomeController@orders')->name('order');
Route::get('/cart','HomeController@cart')->name('cart');
Route::get('/user','HomeController@user')->name('profile');


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


// ---------------------------  後台 先不用middleware 比較方便  ---------------------------------- //
// Route::prefix('admin')->name('admin')->middleware('can:admin')->group(function () { // 後台
    Route::prefix('admin')->name('admin')->group(function () {
        Route::get('/', 'AdminController@main');
        Route::get('/news', 'AdminController@news')->name('.news');
        Route::get('/banner', 'AdminController@banner')->name('.banner');
        Route::get('/category', 'AdminController@category')->name('.category');
        Route::get('/order', 'AdminController@order')->name('.order');
        Route::get('/user', 'AdminController@user')->name('.user');
        Route::get('/product', 'AdminController@product')->name('.product');
    });
