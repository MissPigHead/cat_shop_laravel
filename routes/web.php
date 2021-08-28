<?php

Route::name('admin')->prefix('admin')->group(function () { // 後台
// Route::middleware('can:admin')->name('admin')->prefix('admin')->group(function () { // 後台
    Route::get('/', 'HomeController@backend');
    Route::namespace('Backend')->group(function () {
        Route::get('/news', 'NewsController@index')->name('.news');
        Route::get('/banner', 'BannerController@index')->name('.banner');
        Route::get('/category', 'CategoryController@index')->name('.category');
        Route::get('/order', 'OrderController@index')->name('.order');
        Route::get('/user', 'UserController@index')->name('.user');
        Route::get('/product', 'ProductController@index')->name('.product');
    });
});

Auth::routes();

Route::get('/', 'HomeController@frontend')->name('home');


Route::namespace('Frontend')->group(function () {
    Route::Resource('/categories', 'CategoryController')->only(['index', 'show']);
    Route::Resource('/news', 'NewsController')->only(['index', 'show']);
    Route::Resource('/products', 'ProductController')->only(['index', 'show']);
    Route::Resource('/orders', 'OrderController')->only(['index', 'show']);
    // Route::apiResource('/user', 'UserController');
    Route::get('/cart', 'UserController@cart')->name('cart');
    Route::get('/orders', 'UserController@orders')->name('orders');
});


// ----------------- 測試用 -------------------- //
use App\Models\User;
use App\Models\Product;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\UserCollection;

Route::get('/test2', function () {
    return UserResource::collection(User::with('recipients')->with('orders')->get());
    // return UserResource::collection(User::all()->keyBy->id);
});

Route::get('/test6', function () {
    return ProductResource::collection(Product::paginate(10));
});

