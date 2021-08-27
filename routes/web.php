<?php

Route::name('admin')->prefix('admin')  // 後台
    // -> middleware('can:admin') // 使用middleware 控制權限
    ->group(function () {
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
Route::get('/admin', 'HomeController@backend')->name('admin');

Route::namespace('Frontend')->group(function () {
    Route::Resource('/categories', 'CategoryController')->only(['index','show']);
    Route::Resource('/news', 'NewsController')->only(['index','show']);
    Route::Resource('/products', 'ProductController')->only(['index','show']);
    Route::Resource('/orders', 'OrderController')->only(['index','show']);
});
