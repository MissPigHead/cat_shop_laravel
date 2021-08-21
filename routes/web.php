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

use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('frontend.main');
});

Route::name('admin') -> prefix('admin')
// -> middleware('can:admin')
-> group(function () {  // 後台，使用middleware 控制權限
    Route::get('/', 'AdminController@index');
    Route::namespace('API') -> group(function () {
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
