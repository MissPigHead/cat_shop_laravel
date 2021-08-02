<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.main');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('backend.main');
    });
    Route::get('/banner', function () {
        return view('backend.banner');
    });
    Route::get('/orders', function () {
        return view('backend.orders');
    });
    Route::get('/products', function () {
        return view('backend.products');
    });
    Route::get('/news', function () {
        return view('backend.news');
    });
    Route::get('/members', function () {
        return view('backend.members');
    });
    Route::get('/category', function () {
        return view('backend.category');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
