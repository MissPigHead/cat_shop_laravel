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
// 測試intervention 套件
use Intervention\Image\Facades\Image;

Route::get('/', function () {
    return view('frontend.main');
});

// Route::prefix('admin')->group(function () {  // 後台
//     Route::get('/', 'AdminController@index')->name('admin');
//     Route::get('/{content}', 'AdminController@content');

// Route::name('admin')->prefix('admin')->group(function () {  // 後台
Route::name('admin') -> prefix('admin') -> group(function () {  // 後台
    Route::get('/', 'AdminController@index');
    // Route::name('API')

    Route::namespace('API') -> group(function () {
        // Route::get('/{content}', 'NewsController@index')->name('.{content}');
        Route::get('/news', 'NewsController@index')->name('.news');
        Route::get('/banner', 'BannerController@index')->name('.banner');
        Route::get('/category', 'CategoryController@index')->name('.category');
        Route::get('/orders', 'BannerController@index')->name('.orders');
        Route::get('/members', 'BannerController@index')->name('.members');
        Route::get('/products', 'BannerController@index')->name('.products');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// usage inside a laravel route
Route::get('/', function () {
    $img = Image::make('https://imgix.bustle.com/uploads/getty/2018/11/9/d3f38908-548d-49e3-89e0-1c83d4bd8bde-getty-1059451990.jpg?w=1200&fit=crop&crop=faces&auto=format%2Ccompress')->resize(300, 200);
    return $img->response('jpg');
});

// Route::name('admin')->prefix('admin')->group(function () {  // 後台
// Route::name('admin') ->prefix('admin') ->group(function () {  // 後台
//     Route::get('/', 'AdminController@index');
//     // Route::name('API')
//     Route::get('/{content}', 'AdminController@content')->name('.{content}');
